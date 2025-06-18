<?php
session_start();
require_once 'condb.php';

if (!isset($_SESSION['user_login']) || !in_array($_SESSION['user_type'], ['admin', 'editor'])) {
    header("location: login.php");
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT user_id, firstname, lastname FROM t_employee_ita WHERE username = ?");
    $stmt->execute([$_SESSION['user_login']]);
    $row = $stmt->fetch();

    if ($row) {
        $_SESSION['user_id'] = $row['user_id'];
    } else {
        echo "ไม่พบข้อมูล user!";
        exit();
    }
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                <div class="container-fluid">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">แก้ไขเอกสาร</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="doc_file_edit_db.php" id="EditFile" method="POST" enctype="multipart/form-data">
                                <?php
                                require_once 'condb.php'; // อย่าลืม
                                if (isset($_POST['id'])) {
                                    $id = $_POST['id'];
                                    $stmt = $pdo->prepare("SELECT * FROM t_doc_file WHERE id = :id");
                                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                                    $stmt->execute();
                                    $row = $stmt->fetch();
                                }
                                ?>
                                <div class="form first">
                                    <div class="details personal">
                                        <div class="fields row">
                                            <div class="input-field col-4 mt-2">
                                                <label for="id">รหัสเอกสาร</label>
                                                <input type="text" value="<?= htmlspecialchars($row['id']); ?>" class="form-control" name="id" readonly />
                                            </div>
                                            <div class="input-field col-4 mt-2">
                                                <label for="type_file">ประเภท</label>
                                                <input type="text" value="<?= htmlspecialchars($row['type_file']); ?>" class="form-control" name="type_file" <?= (isset($_SESSION['user_type']) && $_SESSION['user_type'] !== 'admin') ? 'readonly' : ''; ?> />
                                            </div>
                                            <div class="input-field col-4 mt-2">
                                                <label for="group_file">กลุ่ม</label>
                                                <input type="text" value="<?= htmlspecialchars($row['group_file']); ?>" class="form-control" name="group_file" <?= (isset($_SESSION['user_type']) && $_SESSION['user_type'] !== 'admin') ? 'readonly' : ''; ?> />
                                            </div>
                                            <div class="input-field col-12 mt-2">
                                                <label for="name_file">ชื่อไฟล์</label>
                                                <input type="text" value="<?= htmlspecialchars($row['name_file']); ?>" class="form-control" name="name_file" <?= (isset($_SESSION['user_type']) && $_SESSION['user_type'] !== 'admin') ? 'readonly' : ''; ?> />
                                            </div>

                                            <div class="input-field col-12 mt-2">
                                                <label>ไฟล์เอกสาร (.pdf)
                                                    <?php if (!empty($row['file_pdf'])): ?>
                                                        <a href="docs/<?= htmlspecialchars($row['file_pdf']); ?>" target="_blank" class="btn btn-info btn-sm text-white rounded">
                                                            ดูไฟล์ PDF
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="text-danger">ไม่มีไฟล์</span>
                                                    <?php endif; ?>

                                                </label>
                                                <input type="file" name="file_pdf" class="form-control" accept="application/pdf">
                                                <!-- hidden ส่งชื่อไฟล์เก่าไปด้วย -->
                                                <input type="hidden" name="file_pdf2" value="<?= htmlspecialchars($row['file_pdf']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" onclick="history.back()" class="btn btn-secondary mt-4">ยกเลิก</button>
                                    <button type="submit" name="update" class="btn btn-success mt-4">บันทึก</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
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
        <script src="./js/sb-admin-2.min.js"></script>

        <!-- Bootstrap + SweetAlert2 -->
        <script src="./js/jquery-3.7.1.min.js"></script>
        <script src="./js/sweetalert2.all.min.js"></script>

        <script>
            $(document).ready(function() {
                $("#EditFile").submit(function(e) {
                    e.preventDefault();

                    let formUrl = $(this).attr("action");
                    let reqMethod = $(this).attr("method");
                    let formData = new FormData(this);

                    $.ajax({
                        url: formUrl,
                        type: reqMethod,
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        xhrFields: {
                            withCredentials: true // ✅ เพิ่มบรรทัดนี้ เพื่อส่ง session ไปด้วย
                        },
                        success: function(result) {
                            if (result.status == "success") {
                                Swal.fire("สำเร็จ!", result.msg, "success").then(function() {
                                    window.location.href = 'doc_file.php';
                                });
                            } else {
                                Swal.fire("ล้มเหลว!", result.msg, "error");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            Swal.fire("ผิดพลาด!", "ไม่สามารถส่งข้อมูลได้", "error");
                        }
                    });
                });
            });
        </script>


</body>

</html>