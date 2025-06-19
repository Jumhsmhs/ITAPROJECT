<?php
session_start();
require_once 'condb.php';

$stmt = $pdo->prepare("SELECT * FROM t_doc_file");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$docData = [];
foreach ($result as $row) {
    $docData[$row['id']] = $row;
}

$budget_year = isset($_GET['year']) ? $_GET['year'] : '2569'; // ปีเริ่มต้นหากไม่มีค่า
$budget_year2 = isset($_SESSION['budget_year2']) ? $_SESSION['budget_year2'] : '2569';

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
        <?php include 'sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Start of Topbar -->
                <?php include 'navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 m-4">
                        <h3 class="mb-0 text-gray-800 mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                            MOIT10 หน่วยงานมีสรุปผลการดำเนินงานเรื่องร้องเรียนการปฏิบัติงานหรือการให้บริการ ของเจ้าหน้าที่ภายในหน่วยงาน และเรื่องร้องเรียนการทุจริตและประพฤติมิชอบ
                        </h3>
                    </div>

                    <!-- Content Row -->
                    <div class="row m-4">
                        <table class="table table-bordered bg-white ">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 90%; font-weight: 400;">ชื่อหัวข้อเอกสาร</th>
                                    <th class="text-center" rowspan="1" colspan="1" style="width: 10%; font-weight: 400;">ดูเอกสาร</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="mitr-light text-primary" style="font-family: 'Mitr', sans-serif; font-weight: 400;" colspan="3">
                                        ไตรมาสที่ 2 (สรุปผลการดำเนินงานฯ รอบ 6 เดือน)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mitr-light text-dark" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                                        1. มีบันทึกข้อความ ที่ผู้บริหารลงนามรับทราบรายงานสรุปผลการดำเนินงานเรื่องร้องเรียนตามข้อ (1) และข้อ (2) ที่มีการวิเคราะห์ปัญหา / อุปสรรคและแนวทางแก้ไข และมีการขออนุญาตนำไปเผยแพร่บนเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0112';
                                    ?>
                                    <td class="text-center">
                                        <?php if (!empty($docData[$target_id]) && !empty($docData[$target_id]['file_pdf'])): ?>
                                            <a
                                                href="docs/<?= htmlspecialchars($docData[$target_id]['file_pdf']); ?>"
                                                target="_blank"
                                                class="btn btn-outline-primary btn-sm rounded">
                                                ไฟล์ PDF
                                            </a>
                                        <?php else: ?>
                                            <span class="text-danger">ไม่มีไฟล์</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="mitr-light text-dark" style="font-family: 'Mitr', sans-serif; font-weight: 400;" colspan="3">
                                        2. มีรายงานสรุปผลการดำเนินงานเรื่องร้องเรียนตามข้อ (1) และข้อ (2) รอบ 6 เดือน ที่มีการวิเคราะห์ปัญหา / อุปสรรคและแนวทางแก้ไข (แนบตามข้อ 1.) รอบ 6 เดือน (1 ตุลาคม 2567-31 มีนาคม 2568) ประกอบด้วย
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                                        2.1 สรุปผลการดำเนินงานเรื่องร้องเรียนการปฏิบัติงานหรือการให้บริการของเจ้าหน้าที่ภายในหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0113';
                                    ?>
                                    <td class="text-center">
                                        <?php if (!empty($docData[$target_id]) && !empty($docData[$target_id]['file_pdf'])): ?>
                                            <a
                                                href="docs/<?= htmlspecialchars($docData[$target_id]['file_pdf']); ?>"
                                                target="_blank"
                                                class="btn btn-outline-primary btn-sm rounded">
                                                ไฟล์ PDF
                                            </a>
                                        <?php else: ?>
                                            <span class="text-danger">ไม่มีไฟล์</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                                        2.2 สรุปผลการดำเนินงานเรื่องร้องเรียนการทุจริตและประพฤติมิชอบ
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0114';
                                    ?>
                                    <td class="text-center">
                                        <?php if (!empty($docData[$target_id]) && !empty($docData[$target_id]['file_pdf'])): ?>
                                            <a
                                                href="docs/<?= htmlspecialchars($docData[$target_id]['file_pdf']); ?>"
                                                target="_blank"
                                                class="btn btn-outline-primary btn-sm rounded">
                                                ไฟล์ PDF
                                            </a>
                                        <?php else: ?>
                                            <span class="text-danger">ไม่มีไฟล์</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mitr-light text-dark" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                                        3. มีแบบฟอร์มการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0115';
                                    ?>
                                    <td class="text-center">
                                        <?php if (!empty($docData[$target_id]) && !empty($docData[$target_id]['file_pdf'])): ?>
                                            <a
                                                href="docs/<?= htmlspecialchars($docData[$target_id]['file_pdf']); ?>"
                                                target="_blank"
                                                class="btn btn-outline-primary btn-sm rounded">
                                                ไฟล์ PDF
                                            </a>
                                        <?php else: ?>
                                            <span class="text-danger">ไม่มีไฟล์</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mitr-light text-primary" style="font-family: 'Mitr', sans-serif; font-weight: 400;" colspan="3">
                                        ไตรมาสที่ 4 (สรุปผลการดำเนินงานฯ รอบ 12 เดือน)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mitr-light text-dark" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                                        1. มีบันทึกข้อความ ที่ผู้บริหารลงนามรับทราบรายงานสรุปผลการดำเนินงานเรื่องร้องเรียนตามข้อ (1) และข้อ (2) ที่มีการวิเคราะห์ปัญหา / อุปสรรคและแนวทางแก้ไข และมีการขออนุญาตนำไปเผยแพร่บนเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0116';
                                    ?>
                                    <td class="text-center">
                                        <?php if (!empty($docData[$target_id]) && !empty($docData[$target_id]['file_pdf'])): ?>
                                            <a
                                                href="docs/<?= htmlspecialchars($docData[$target_id]['file_pdf']); ?>"
                                                target="_blank"
                                                class="btn btn-outline-primary btn-sm rounded">
                                                ไฟล์ PDF
                                            </a>
                                        <?php else: ?>
                                            <span class="text-danger">ไม่มีไฟล์</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="mitr-light text-dark" style="font-family: 'Mitr', sans-serif; font-weight: 400;" colspan="3">
                                        2. มีรายงานสรุปผลการดำเนินงานเรื่องร้องเรียนตามข้อ (1) และข้อ (2) รอบ 12 เดือน ที่มีการวิเคราะห์ปัญหา / อุปสรรคและแนวทางแก้ไข (แนบตามข้อ 1.) รอบ 12 เดือน (1 เมษายน 2567 - 31 สิงหาคม 2567) ประกอบด้วย
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                                        2.1 สรุปผลการดำเนินงานเรื่องร้องเรียนการปฏิบัติงานหรือการให้บริการของเจ้าหน้าที่ภายในหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0117';
                                    ?>
                                    <td class="text-center">
                                        <?php if (!empty($docData[$target_id]) && !empty($docData[$target_id]['file_pdf'])): ?>
                                            <a
                                                href="docs/<?= htmlspecialchars($docData[$target_id]['file_pdf']); ?>"
                                                target="_blank"
                                                class="btn btn-outline-primary btn-sm rounded">
                                                ไฟล์ PDF
                                            </a>
                                        <?php else: ?>
                                            <span class="text-danger">ไม่มีไฟล์</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                                        2.2 สรุปผลการดำเนินงานเรื่องร้องเรียนการทุจริตและประพฤติมิชอบ
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0118';
                                    ?>
                                    <td class="text-center">
                                        <?php if (!empty($docData[$target_id]) && !empty($docData[$target_id]['file_pdf'])): ?>
                                            <a
                                                href="docs/<?= htmlspecialchars($docData[$target_id]['file_pdf']); ?>"
                                                target="_blank"
                                                class="btn btn-outline-primary btn-sm rounded">
                                                ไฟล์ PDF
                                            </a>
                                        <?php else: ?>
                                            <span class="text-danger">ไม่มีไฟล์</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mitr-light text-dark" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                                        3. มีแบบฟอร์มการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0119';
                                    ?>
                                    <td class="text-center">
                                        <?php if (!empty($docData[$target_id]) && !empty($docData[$target_id]['file_pdf'])): ?>
                                            <a
                                                href="docs/<?= htmlspecialchars($docData[$target_id]['file_pdf']); ?>"
                                                target="_blank"
                                                class="btn btn-outline-primary btn-sm rounded">
                                                ไฟล์ PDF
                                            </a>
                                        <?php else: ?>
                                            <span class="text-danger">ไม่มีไฟล์</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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



</body>

</html>