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
                            MOIT17 หน่วยงานมีการประเมินความเสี่ยงการทุจริต ประจำปีงบประมาณ พ.ศ. 2568 อย่างเป็นระบบ
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
                                        ไตรมาสที่ 2
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mitr-light text-dark" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                                        1. มีบันทึกข้อความ แสดงถึงการขออนุมัติจัดการประชุมการจัดทำแผนบริหารความเสี่ยงการทุจริต ประจำปีงบประมาณ พ.ศ. 2568 ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0163';
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
                                        2. มีรายงานการประชุมการจัดทำแผนบริหารความเสี่ยงการทุจริต ประจำปีงบประมาณ พ.ศ. 2568 ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0164';
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
                                        3. มีบันทึกข้อความ ที่ผู้บริหารลงนามรับทราบรายงานแผนบริหารความเสี่ยงการทุจริต ประจำปีงบประมาณ พ.ศ. 2568 ของหน่วยงานที่ชัดเจน และมีการขออนุญาตนำไปเผยแพร่ บนเว็บไซต์ของหน่วยงาน
                                        <?php
                                        $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                        $target_id = $selected_year . '0165';
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
                                        4. มีรายงานแผนบริหารความเสี่ยงการทุจริต ประจำปีงบประมาณ พ.ศ. 2568 ของหน่วยงาน โดยจัดทำเป็นรูปเล่มรายงานที่มีการวิเคราะห์ความเสี่ยงและจัดทำแผนบริหาร ความเสี่ยงการทุจริตทั้ง 8 ขั้นตอน
                                        <ul>
                                            <li>
                                                (ขั้นตอนที่ 1-8 หน้า 97 ถึงหน้า 104)
                                            </li>
                                        </ul>
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0166';
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
                                        5. มีแบบฟอร์มการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0167';
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