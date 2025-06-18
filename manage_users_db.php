<?php
session_start();
header('Content-Type: application/json');
require_once "condb.php";

$user_id = $_POST['user_id'];
$type = $_POST['type'];


try {
    $stmt = $pdo->prepare("UPDATE t_employee_ita SET type = :type WHERE user_id = :user_id");
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":type", $type);
    $stmt->execute();


    if ($stmt->rowCount() > 0) {
        echo json_encode(array("status" => "success", "msg" => "Change Type successful!"));
    } else {
        echo json_encode(array("status" => "error", "msg" => "Invalid credentials"));
    }
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "msg" => "Invalid credentials: " . $e->getMessage()]);
}
