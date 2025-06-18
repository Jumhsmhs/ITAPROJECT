<?php
session_start(); // ต้องมี เพื่อดึง $_SESSION ได้
// ปิด Error (เพื่อ AJAX จะรับ JSON ได้สมบูรณ์)
error_reporting(0);
ini_set('display_errors', 0);
date_default_timezone_set('Asia/Bangkok');

if (isset($_POST['name_file'])) {
    require_once 'condb.php';
    $date1 = date("Ymd_His");
    $numrand = 1085900;
    $file_pdf = (isset($_POST['file_pdf']) ? $_POST['file_pdf'] : '');
    $id = $_POST['id'];
    $type_file = $_POST['type_file'];
    $group_file = $_POST['group_file'];
    $name_file = $_POST['name_file'];
    $start_date = date('Y-m-d H:i:s');
    $user_id = $_SESSION['user_id'];
    if (!$id) {
        echo json_encode(array("status" => "warning", "msg" => "กรุณากรอกชื่อของท่าน"));
    } else if (!$type_file) {
        echo json_encode(array("status" => "warning", "msg" => "กรุณากรอกนามสกุลของท่าน"));
    } else if (!$group_file) {
        echo json_encode(array("status" => "warning", "msg" => "กรุณากรอกรหัสผ่านของท่าน"));
    } else if (!$name_file) {
        echo json_encode(array("status" => "warning", "msg" => "กรุณากรอกชื่อผู้ใช้งานของท่าน"));
    } else {
        // ตรวจสอบว่ามีรหัสไฟล์งานนี้ในระบบแล้วหรือยัง
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM t_doc_file WHERE id = ?');
        $stmt->execute([$id]);
        $IdExists = $stmt->fetchColumn();

        if ($IdExists) {
            echo json_encode(array("status" => "warning", "msg" => "มีรหัสเอกสารนี้ในระบบแล้ว"));
        
            } else {

                try {
                    $stmt = $pdo->prepare("INSERT INTO t_doc_file (id,type_file,group_file, name_file, file_pdf ,start_date ,user_id ) VALUES (:id,:type_file,:group_file, :name_file, :file_pdf ,:start_date ,:user_id )");
                    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                    $stmt->bindParam(':type_file', $type_file, PDO::PARAM_STR);
                    $stmt->bindParam(':group_file', $group_file, PDO::PARAM_STR);
                    $stmt->bindParam(':name_file', $name_file, PDO::PARAM_STR);
                    $stmt->bindParam(':file_pdf', $newname, PDO::PARAM_STR);
                    $stmt->bindParam(':start_date', $start_date, PDO::PARAM_STR);
                    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                    $result = $stmt->execute();
                    $pdo = null; // ปิดการเชื่อมต่อกับฐานข้อมูล 

                    if ($result > 0) {
                        echo json_encode(array("status" => "success", "msg" => "เพิ่มเอกสารใหม่สำเร็จ"));
                    } else {
                        echo json_encode(array("status" => "warning", "msg" => "ไม่สามารถเพิ่มเอกสารใหม่ได้"));
                    }
                } catch (PDOException $e) {
                    echo json_encode(array("status" => "warning", "msg" => "เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง"));
                }
            }
        }
    }

