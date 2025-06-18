<?php
session_start();
require_once 'condb.php';

    date_default_timezone_set('Asia/Bangkok');//ตั้ง Timezone thailand
    $date1 = date("YmdHis");
    $username = $_POST['username'];
    $user_id = 108590000 . $date1;
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $type = $_POST['type'];
    $record_date_time = date("Y-m-d H:i:s");
    $last_login = null; //ให้เป็น null ตอนสมัครสมาชิก ค่าเริ่มต้น
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

    try {
        $stmt = $pdo->prepare("INSERT INTO t_employee_ita 
            (user_id, username, password, firstname, lastname, type, record_date_time, last_login)
            VALUES (:user_id, :username, :password, :firstname, :lastname, :type, :record_date_time, :last_login)");

        $stmt->execute([
            ':user_id' => $user_id,
            ':username' => $username,
            ':password' => $hashedPassword,
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':type' => $type,
            ':record_date_time' => $record_date_time,
            ':last_login' => $last_login
        ]);

        $user_id = $pdo->lastInsertId();

        // echo "ID ล่าสุด: " . $user_id;

        if ($stmt->rowCount() > 0) {
            echo json_encode(array("status" => "success", "msg" => "Add User successful!"));
        } else {
            echo json_encode(array("status" => "error", "msg" => "Invalid credentials"));
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "msg" => "Invalid credentials: " . $e->getMessage()]);
    }

