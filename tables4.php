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
                            MOIT4 หน่วยงานมีการวางระบบการจัดซื้อจัดจ้างหรือการจัดหาพัสดุ ประจำปีงบประมาณ พ.ศ. 2568
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
                                    <td class="mitr-light text-dark" style="font-family: 'Mitr', sans-serif; font-weight: 400;" colspan="3">
                                        ข้อ 1. ประกาศเผยแพร่แผนการจัดซื้อจัดจ้างและการจัดหาพัสดุ ประจำปีของหน่วยงาน ภายใน 30 วันทำการ ระบุวันที่ที่ได้รับการจัดสรรงบประมาณในช่องคำอธิบายชี้แจงประกอบหลักฐาน วันที่ที่ได้ ทำการประกาศเผยแพร่ให้ชัดเจน</td>
                                </tr>
                                <tr>
                                    <td>

                                        1. มีบันทึกข้อความ ที่ผู้บริหารลงนามรับทราบแผนการจัดซื้อจัดจ้างประจำปีของหน่วยงานและมีการขออนุญาตนำไปเผยแพร่บนเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0048';
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
                                    <td>
                                        2. มีหนังสือจัดสรรงบประมาณของหน่วยงาน ประจำปีงบประมาณ พ.ศ. 2568
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0049';
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
                                    <td>
                                        3. มีแผนการจัดซื้อจัดจ้างและการจัดหาพัสดุของหน่วยงาน ประจำปีงบประมาณ พ.ศ. 2568 (งบดำเนินการและงบลงทุน)
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0050';
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
                                    <td>
                                        4. มีคำสั่งมอบหมายการปิดประกาศ หรือปลดประกาศ
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0051';
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
                                    <td>
                                        5. มีแบบฟอร์มการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0052';
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
                                    <td colspan="3" class="mitr-light text-dark" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                                        ข้อ 2. รายงานผลของแผนการจัดซื้อจัดจ้างและการจัดหาพัสดุประจำปีของหน่วยงาน ตามรอบระยะเวลา ที่กำหนด
                                        <ul>
                                            <li>
                                                2.1 งบลงทุน ทุกไตรมาส
                                            </li>
                                            <li>
                                                2.2 งบดำเนินงาน ทุกไตรมาส
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="mitr-light text-warning" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                                        ไตรมาสที่ 1
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        1. มีบันทึกข้อความ ที่ผู้บริหารรับทราบรายงานผลของแผนการจัดซื้อจัดจ้างประจำปี ของหน่วยงาน และมีการขออนุญาตนำไปเผยแพร่บนเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0053';
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
                                    <td>
                                        2. มีรายงานผลการดำเนินการตามแผนการจัดซื้อจัดจ้างและการจัดหาพัสดุ ประจำปีงบประมาณ พ.ศ. 2567 ตามข้อกำหนด
                                        2.1 งบลงทุน ทุกไตรมาส
                                        2.2 งบดำเนินงาน ทุกไตรมาส

                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0054';
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
                                    <td>
                                        3. มีแบบฟอร์มการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0055';
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
                                    <td colspan="3" class="mitr-light text-warning" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                                        ไตรมาสที่ 2
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        1. มีบันทึกข้อความ ที่ผู้บริหารรับทราบรายงานผลของแผนการจัดซื้อจัดจ้างประจำปี ของหน่วยงาน และมีการขออนุญาตนำไปเผยแพร่บนเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0056';
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
                                    <td>
                                        2. มีรายงานผลการดำเนินการตามแผนการจัดซื้อจัดจ้างและการจัดหาพัสดุ ประจำปีงบประมาณ พ.ศ. 2567 ตามข้อกำหนด
                                        2.1 งบลงทุน ทุกไตรมาส
                                        2.2 งบดำเนินงาน ทุกไตรมาส
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0057';
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
                                    <td>
                                        3. มีแบบฟอร์มการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0058';
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
                                    <td colspan="3" class="mitr-light text-warning" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                                        ไตรมาสที่ 3
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        1. มีบันทึกข้อความ ที่ผู้บริหารรับทราบรายงานผลของแผนการจัดซื้อจัดจ้างประจำปี ของหน่วยงาน และมีการขออนุญาตนำไปเผยแพร่บนเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0059';
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
                                    <td>
                                        2. มีรายงานผลการดำเนินการตามแผนการจัดซื้อจัดจ้างและการจัดหาพัสดุ ประจำปีงบประมาณ พ.ศ. 2567 ตามข้อกำหนด
                                        2.1 งบลงทุน ทุกไตรมาส
                                        2.2 งบดำเนินงาน ทุกไตรมาส

                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0060';
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
                                    <td>
                                        3. มีแบบฟอร์มการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0061';
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
                                    <td colspan="3" class="mitr-light text-warning" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
                                        ไตรมาสที่ 4
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        1. มีบันทึกข้อความ ที่ผู้บริหารรับทราบรายงานผลของแผนการจัดซื้อจัดจ้างประจำปี ของหน่วยงาน และมีการขออนุญาตนำไปเผยแพร่บนเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0062';
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
                                    <td>
                                        2. มีรายงานผลการดำเนินการตามแผนการจัดซื้อจัดจ้างและการจัดหาพัสดุ ประจำปีงบประมาณ พ.ศ. 2567 ตามข้อกำหนด
                                        2.1 งบลงทุน ทุกไตรมาส
                                        2.2 งบดำเนินงาน ทุกไตรมาส

                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0063';
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
                                    <td>
                                        3. มีแบบฟอร์มการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0064';
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
                                        ข้อ 3. การป้องกันผู้ที่มีหน้าที่ดำเนินการในการจัดซื้อจัดจ้างเป็นผู้มีส่วนได้ส่วนเสียกับผู้ยื่นข้อเสนอหรือคู่สัญญา
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        1. มีบันทึกข้อความแจ้งเวียนประกาศสำนักงานปลัดกระทรวงสาธารณสุขว่าด้วย แนวทางปฏิบัติงานเพื่อตรวจสอบบุคลากรในหน่วยงานด้านการจัดซื้อจัดจ้าง พ.ศ. 2560 และมีการขออนุญาตนำไปเผยแพร่บนเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0065';
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
                                    <td>
                                        2. มีประกาศสำนักงานปลัดกระทรวงสาธารณสุขว่าด้วยแนวทางปฏิบัติงานเพื่อตรวจสอบบุคลากรในหน่วยงานด้านการจัดซื้อจัดจ้าง พ.ศ. 2560 ลงวันที่ 12 ตุลาคม พ.ศ. 2560 และแบบแสดงความบริสุทธิ์ใจในการจัดซื้อจัดจ้างของหน่วยงานในการเปิดเผยข้อมูลความขัดแย้งทางผลประโยชน์ของหัวหน้าเจ้าหน้าที่ เจ้าหน้าที่ และผู้ตรวจรับพัสดุ จำนวน 2 แบบ คือ วงเงินเล็กน้อยไม่เกิน 100,000 บาท และวงเงินเกิน 100,000 บาท
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0066';
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
                                    <td>
                                        3. มีแบบฟอร์มการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของหน่วยงาน
                                    </td>
                                    <?php
                                    $selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
                                    $target_id = $selected_year . '0067';
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