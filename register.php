<?php
session_start();
require_once 'condb.php';

if (!isset($_SESSION['user_login']) || !in_array($_SESSION['user_type'], ['admin', 'editor'])) {
    header("location: login.php");
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT firstname, lastname FROM t_employee_ita WHERE username = ?");
    $stmt->execute([$_SESSION['user_login']]);
    $row = $stmt->fetch();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ITA Ban Sang Hospital</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap');
    </style>
</head>

<body id="page-top" class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 300;">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Start of Sidebar -->
        <?php include 'sidebar2.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Start of Topbar -->
                <?php include 'nav.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid ">
                    <h3>เพิ่มผู้ใช้งานใหม่</h3>
                    <p>เพิ่มผู้ใช้งาน ในการมีส่วนร่วมอัปโหลดไฟล์เอกสาร และจัดการเอกสารภายในเว็บไซต์</p>
                    <div class="row p-4">
                        <div class="col-lg-6 p-4 border rounded shadow bg-white">
                            <div class="">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">สร้างผู้ใช้งานใหม่ <i class="fas fa-user-plus" style="color: #74C0FC;"></i></h1>
                                    <p>สำหรับเข้าใช้งานเพื่ออัปโหลดไฟล์เอกสาร ระบบ ITA เท่านั้น</p>
                                </div>
                                <form action="register_db.php" method="post" class="user">
                                    <?php if (isset($_SESSION['error'])) : ?>
                                        <div class="error">
                                            <h3>
                                                <?php
                                                echo $_SESSION['error'];
                                                unset($_SESSION['error']);
                                                ?>
                                            </h3>
                                        </div>
                                    <?php endif ?>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="firstname" class="form-control form-control-user" id="exampleFirstName"
                                                placeholder="First Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="lastname" class="form-control form-control-user" id="exampleLastName"
                                                placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="username" class="form-control form-control-user" id="exampleUsername"
                                                placeholder="Username">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12 mb-12 mb-sm-0">
                                            <label class="form-label d-block">สิทธิ์การเข้าใช้งาน</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="type" id="roleAdmin" value="admin">
                                                <label class="form-check-label" for="roleAdmin">Admin</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="type" id="roleEditor" value="editor">
                                                <label class="form-check-label" for="roleEditor">Editor</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center text-center">
                                        <button type="submit" name="register" class="col-12 btn btn-primary rounded-pill">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 p-4 border rounded shadow bg-white">
                            <div class="">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4 ">ข้อกำหนด และสิทธิ์การเข้าใช้งาน และเข้าถึงข้อมูล</h1>
                                </div>
                                <div class="text-start">
                                    <p class="text-center">เฉพาะเจ้าหน้าที่ที่มีบทบาทในการอัปโหลดไฟล์เอกสาร เพื่อใช้ในการประเมิน ITA เท่านั้น </p>
                                    <ul>
                                        <li>การเข้าถึงในสิทธิ์ Editor
                                            <ul>
                                                <li>สามารถอัปโหลดเอกสาร แบบไฟล์ PDF</li>
                                                <li>คัดลอกลิงก์</li>
                                                <li>เพิ่มดูไฟล์เอกสาร PDF</li>
                                            </ul>
                                        </li>
                                        <li>การเข้าถึงในสิทธิ์ Admin
                                            <ul>
                                                <li>สามารถอัปโหลดเอกสาร แบบไฟล์ PDF</li>
                                                <li>คัดลอกลิงก์</li>
                                                <li>เพิ่มดูไฟล์เอกสาร PDF</li>
                                                <li>แก้ไขเนื้อหาในแต่ละหัวข้อเอกสาร</li>
                                                <li>ลบหัวข้อเอกสารทิ้งได้</li>
                                                <li>เพิ่มผู้ใช้งานใหม่</li>
                                                <li>จัดการสิทธิ์การใช้งานของผู้ใช้งาน</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./js/jquery-3.7.1.min.js"></script>
        <script src="./js/sweetalert2.all.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".user").submit(function(e) {
                    e.preventDefault();

                    let formUrl = $(this).attr("action");
                    let reqMethod = $(this).attr("method");
                    let formData = $(this).serialize();

                    $.ajax({
                        url: formUrl,
                        type: reqMethod,
                        data: formData,
                        dataType: "json", // ✅ คาดหวัง JSON กลับจาก PHP
                        success: function(result) {
                            if (result.status == "success") {
                                console.log("Success", result);
                                Swal.fire("สำเร็จ!", result.msg, "success").then(function() {
                                    window.location.reload();
                                });
                            } else {
                                console.log("Error", result);
                                Swal.fire("ล้มเหลว!", result.msg, "error");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX ERROR:", error);
                            Swal.fire("ผิดพลาด!", "Invalid credentials", "error");
                        }
                    });
                });
            });
        </script>
</body>

</html>