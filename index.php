<?php
session_start();
require_once 'condb.php';

// สมมุติว่า $pdo เชื่อมต่อแล้ว
$stmt = $pdo->prepare("SELECT title, due_date FROM events WHERE id = 1"); // เลือกเหตุการณ์เดียว
$stmt->execute();
$event = $stmt->fetch(PDO::FETCH_ASSOC);
$dueDate = $event['due_date']; // เช่น "2025-05-15"

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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        /* body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f4f4;
            text-align: center;
            padding: 50px;
        } */

        .countdown-container {
            background: white;
            border-radius: 10px;
            display: inline-block;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .countdown {
            font-size: 2em;
            color: #2c3e50;
        }

        .label {
            font-size: 0.8em;
            color: #888;
        }
    </style>
</head>

<body id="page-top">

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
                <div class="container-fluid" style="font-family: 'Mitr', sans-serif;">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">MOPH Integrity and Transparency Assessment System</h1>
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

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-6 col-md-6 mb-4">
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
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 text-primary">เกี่ยวกับโรงพยาบาลบ้านสร้าง
                                    </h6>
                                </div>

                                <div class="card-body">
                                    <div class="">
                                        <div class="">
                                            <img src="./img/banner_bansang.png" class="d-block mx-auto img-fluid" alt="...">
                                        </div>
                                        <div class="">
                                            <div class="text-dark font-weight-light mt-4">
                                                การประเมินคุณธรรมและความโปร่งใสในการดำเนินงานของในกสังกัดสำนักงานปลัดกระทรวงสาธารณสุข
                                                <hr>
                                                (MOPH Integrity and Transparency Assessment System)
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- End of Main Content -->
                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <?php include 'footer.php'; ?>
                    </footer>
                    <!-- End of Footer -->
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
                    type: 'line',
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