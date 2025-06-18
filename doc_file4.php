<?php
session_start();
require_once 'condb.php';

if (!isset($_SESSION['user_login']) || !in_array($_SESSION['user_type'], ['admin', 'editor'])) {
    header("location: login.php");
    exit();
}
try {
    $stmt = $pdo->prepare("SELECT firstname, lastname,user_id FROM t_employee_ita WHERE username = ?");
    $stmt->execute([$_SESSION['user_login']]);
    $row = $stmt->fetch();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
if (isset($_GET['year'])) {
    $_SESSION['budget_year'] = $_GET['year'];
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit();
}
$selected_year2 = $_SESSION['budget_year'] ?? '2569';

$stmt = $pdo->prepare("SELECT * FROM t_doc_file WHERE type_file = '0004' AND id LIKE :year_prefix");
$stmt->execute([
    ':year_prefix' => $selected_year2 . '%'
]);
$result = $stmt->fetchAll();
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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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


                    <h3>รายการไฟล์ ไตรมาสที่ 4</h3>
                    <p>สวัสดีคุณ <?php echo $row['firstname'] . " " . $row['lastname'] ?> (สิทธิ์: <?php echo $_SESSION['user_type']; ?>)</p>

                   <table class="table table-bordered  bg-white">
                        <thead>
                            <tr>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400; width: 5%;">ลำดับ</th>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400; width: 5%;">ประเภท</th>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400; width: 5%;">กลุ่ม</th>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400;  width: 35%;">ชื่อหัวข้อเอกสาร</th>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400;  width: 20%;">ไฟล์เอกสาร</th>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400; width: 10%;">วันที่สร้าง</th>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400; width: 5%;">ไฟล์</th>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400; width: 5%;">ลิงก์</th>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400; width: 5%;">แก้ไข</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row) { ?>
                                <tr class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 300;">
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['type_file']; ?></td>
                                    <td><?php echo $row['group_file']; ?></td>
                                    <td><?php echo $row['name_file']; ?></td>
                                    <td><?php echo $row['file_pdf']; ?></td>
                                    <td><?php
                                        if (!empty($row['start_date'])) {
                                            echo date('Y-m-d', strtotime($row['start_date']));
                                        } else {
                                            echo "ไม่มีข้อมูล";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['file_pdf'])): ?>
                                            <a href="docs/<?= htmlspecialchars($row['file_pdf']); ?>" target="_blank" class="text-white btn btn-info btn-sm">
                                                PDF
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['file_pdf'])): ?>
                                            <a id="fileLink" onclick="event.preventDefault(); copyText(this);" href="docs/<?= htmlspecialchars($row['file_pdf']); ?>" target="_blank" class="text-white btn btn-success btn-sm">
                                                Link
                                            </a>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <form action="doc_file_edit.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                            <button type="submit" class="text-white btn btn-warning btn-sm">Edit</button>
                                        </form>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            function copyText(el) {
                const link = el.href;
                navigator.clipboard.writeText(link).then(() => {
                    Swal.fire({
                        title: 'คัดลอกสำเร็จ!',
                        text: 'ลิงก์ถูกคัดลอกไปยังคลิปบอร์ดแล้ว',
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        position: 'top-end',
                        toast: true
                    });
                }).catch(err => {
                    Swal.fire({
                        title: 'เกิดข้อผิดพลาด!',
                        text: 'ไม่สามารถคัดลอกลิงก์ได้',
                        icon: 'error',
                        confirmButtonText: 'ปิด'
                    });
                });
            }
        </script>


</body>

</html>