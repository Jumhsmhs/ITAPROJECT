<?php
session_start();
require_once 'condb.php';

if (!isset($_SESSION['user_login']) || !in_array($_SESSION['user_type'], ['admin', 'editor'])) {
    header("location: login.php");
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT firstname, lastname ,user_id FROM t_employee_ita WHERE username = ?");
    $stmt->execute([$_SESSION['user_login']]);
    $row = $stmt->fetch();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$stmt = $pdo->prepare("SELECT * FROM t_doc_file where type_file = '0001'");
$stmt->execute();
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


    <!-- logo ของ เว็บไซต์ -->
    <link rel="shortcut icon" type="image/jpg" href="./img/img_newlogo.png" />

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
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ระบบอัปโหลดไฟล์เอกสาร ITA</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs text-primary text-uppercase mb-1">
                                                ไตรมาส 1</div>
                                            <?php
                                            try {
                                                $stmt = $pdo->prepare("SELECT * FROM t_doc_file where type_file = '0001' ");
                                                $stmt->execute(); // ต้อง execute ก่อน fetch หรือ rowCount
                                                $count1 = $stmt->rowCount(); // นับจำนวนแถวทั้งหมด
                                            } catch (PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                            }
                                            ?>
                                            <div class="h5 mb-0 text-gray-800"><?= $count1 ?> / 7</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-th-large fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs text-success text-uppercase mb-1">
                                                ไตรมาส 2</div>
                                            <?php
                                            try {
                                                $stmt = $pdo->prepare("SELECT * FROM t_doc_file where type_file = '0002' ");
                                                $stmt->execute(); // ต้อง execute ก่อน fetch หรือ rowCount
                                                $count2 = $stmt->rowCount(); // นับจำนวนแถวทั้งหมด
                                            } catch (PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                            }
                                            ?>
                                            <div class="h5 mb-0  text-gray-800"><?= $count2 ?> / 28</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clone fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs text-info text-uppercase mb-1">
                                                ไตรมาส 3</div>
                                            <?php
                                            try {
                                                $stmt = $pdo->prepare("SELECT * FROM t_doc_file where type_file = '0003' ");
                                                $stmt->execute(); // ต้อง execute ก่อน fetch หรือ rowCount
                                                $count3 = $stmt->rowCount(); // นับจำนวนแถวทั้งหมด
                                            } catch (PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                            }
                                            ?>
                                            <div class="h5 mb-0 text-gray-800"><?= $count3 ?> / 11</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs text-warning text-uppercase mb-1">
                                                ไตรมาส 4</div>
                                            <?php
                                            try {
                                                $stmt = $pdo->prepare("SELECT * FROM t_doc_file where type_file = '0004' ");
                                                $stmt->execute(); // ต้อง execute ก่อน fetch หรือ rowCount
                                                $count4 = $stmt->rowCount(); // นับจำนวนแถวทั้งหมด
                                            } catch (PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                            }
                                            ?>
                                            <div class="h5 mb-0 text-gray-800"><?= $count4 ?> / 18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-th fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 text-primary">สรุปผลคะแนนการประเมิน แยกรายปี</h6>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <canvas id="lineChart"></canvas>
                                    </div>
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

        <script src="js/chart.js"></script>
        <script>
            const ctx = document.getElementById('lineChart').getContext('2d');
            const lineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        'ไตรมาส 1',
                        'ไตรมาส 2',
                        'ไตรมาส 3',
                        'ไตรมาส 4'
                    ],
                    datasets: [{
                            label: 'MOIT 2566',
                            data: [0, 0, 0, 0],
                            fill: true,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgb(255, 99, 132)',
                            pointBackgroundColor: 'rgb(255, 99, 132)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(255, 99, 132)'
                        }, {
                            label: 'MOIT 2567',
                            data: [0, 0, 0, 0],
                            fill: true,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgb(54, 162, 235)',
                            pointBackgroundColor: 'rgb(54, 162, 235)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(54, 162, 235)'
                        },
                        {
                            label: 'MOIT 2568',
                            data: [95.45, 100, 0, 0],
                            fill: true,
                            backgroundColor: 'rgba(235, 229, 54, 0.2)',
                            borderColor: 'rgb(235, 208, 54)',
                            pointBackgroundColor: 'rgb(235, 190, 54)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(235, 220, 54)'
                        },
                        {
                            label: 'MOIT 2569',
                            data: [0, 0, 0, 0],
                            fill: true,
                            backgroundColor: 'rgba(54, 235, 169, 0.2)',
                            borderColor: 'rgb(54, 235, 190)',
                            pointBackgroundColor: 'rgb(54, 235, 190)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(54, 235, 184)'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        r: {
                            angleLines: {
                                display: true
                            },
                            suggestedMin: 0,
                            suggestedMax: 100
                        }
                    }
                }
            });
        </script>
</body>

</html>