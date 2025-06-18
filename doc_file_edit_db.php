<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);
require_once 'condb.php'; // ที่สุดสำหรับ database config
header('Content-Type: application/json'); // ✅ ระบุว่าเราจะส่ง JSON
date_default_timezone_set('Asia/Bangkok'); //ตั้ง Timezone thailand
//ประกาศตัวแปรรับค่าจากฟอร์ม
$id = $_POST['id'];
$type_file = $_POST['type_file'];
$group_file = $_POST['group_file'];
$name_file = $_POST['name_file'];
$file_pdf2 = $_POST['file_pdf2'];
$update_date = date('Y-m-d H:i:s');
$user_id = $_SESSION['user_id'];
$date1 = date("Ymd_His");
$numrand = 1085900;
$file_pdf = (isset($_POST['file_pdf']) ? $_POST['file_pdf'] : '');
$upload = $_FILES['file_pdf']['name'];
//ตัดขื่อเอาเฉพาะนามสกุล
$typefile = strrchr($_FILES['file_pdf']['name'], ".");
//มีการอัพโหลดไฟล์
if ($upload != '') {
    //โฟลเดอร์ที่เก็บไฟล์
    $path = "docs/";
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = 'moit_' . $numrand . $date1 . $typefile;
    $path_copy = $path . $newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['file_pdf']['tmp_name'], $path_copy);
} else {
    $newname = $file_pdf2;
}

$stmt = $pdo->prepare("UPDATE t_doc_file SET 
                            type_file = :type_file,
                            group_file = :group_file,
                            name_file = :name_file,
                            update_date = :update_date,
                            file_pdf = :file_pdf,
                            user_id = :user_id
                            WHERE id = :id
                        ");

$stmt->bindParam(':type_file', $type_file, PDO::PARAM_STR);
$stmt->bindParam(':group_file', $group_file, PDO::PARAM_STR);
$stmt->bindParam(':name_file', $name_file, PDO::PARAM_STR);
$stmt->bindParam(':update_date', $update_date, PDO::PARAM_STR);
$stmt->bindParam(':file_pdf', $newname, PDO::PARAM_STR);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$result = $stmt->execute();
$pdo = null; // ปิดการเชื่อมต่อ

//เงื่อนไขตรวจสอบการเพิ่มข้อมูล
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'msg' => 'อัปโหลดเอกสารสำเร็จ']);
} else {
    echo json_encode(['status' => 'error', 'msg' => 'ไม่สามารถอัปเดตข้อมูลได้']);
}
