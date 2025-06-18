<?php
session_start();
require_once 'condb.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM t_employee_ita WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    if (password_verify($password, $user['password'])) {

        date_default_timezone_set('Asia/Bangkok'); //ตั้ง Timezone thailand
        $last_login = date("Y-m-d H:i:s");

        // อัปเดตข้อมูลในฐานข้อมูล เมื่อ login ให้บันทึกการเปลี่ยนแปลงเวลาเข้าไปใหม่ last_login
        $updatestmt = $pdo->prepare("UPDATE t_employee_ita SET last_login = ? WHERE user_id = ?");
        $updatestmt->execute([$last_login, $user['user_id']]);

        $_SESSION['user_login'] = $user['username'];
        $_SESSION['user_type'] = $user['type']; // 'admin' หรือ 'editor'
        $_SESSION['user_id'] = $user['user_id']; // เก็บ id ด้วย (ถ้าคุณต้องใช้)


        // URL ของ Webhook ที่ได้จาก Discord
        $webhook_url = "https://discord.com/api/webhooks/1351837424208183316/o1ZhF92xFq5Yp9nf3h4maRDMbPhXyCzgUx7HlnkZ0J8y3pX_Bf74urrhNHRJw-QuNyVV"; // เปลี่ยนเป็น Webhook ของเรา

        $messages = [
            $messages = [
                "name" => "ข้อความใหม่",
                "value" => "เข้าสู่ระบบโดย : " . $username . "\nเวลา : " . $last_login . "\nEditor Login completed."
            ]
        ];

        $payload = json_encode([
            "embeds" => [
                [
                    "title" => "ITA 2569 Notify",
                    "fields" => $messages,
                    "color" => 16755481 // สีแดง (HEX:rgb(255, 185, 185))
                ]
            ]
        ]);

        $headers = array('Content-Type: application/json');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $webhook_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response === false) {
            echo json_encode([
                "status" => "error",
                "msg" => "ไม่เข้าสู่ระบบอัปโหลดเอกสาร",
                'user_type' => $user['type']
            ]);
        } else {
            echo json_encode([
                "status" => "success",
                "msg" => "ยินดีต้อนรับเข้าสู่ระบบอัปโหลดเอกสาร",
                'user_type' => $user['type'],
                "discord_response" => json_decode($response, true)
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'msg' => 'รหัสผ่านไม่ถูกต้อง',
            'user_type' => 'passfail'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'msg' => 'ไม่พบชื่อผู้ใช้นี้',
        'user_type' => 'userfail'
    ]);
}
