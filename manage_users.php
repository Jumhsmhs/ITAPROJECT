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

$stmt = $pdo->prepare("SELECT * FROM t_employee_ita");
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


                    <h3>จัดการสิทธิ์การใช้งาน</h3>
                    <p>สวัสดีคุณ <?php echo $row['firstname'] . " " . $row['lastname'] ?> (สิทธิ์: <?php echo $_SESSION['user_type']; ?>)</p>

                    <table class="table table-bordered  bg-white">
                        <thead>
                            <tr>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400; width: 20%;">ลำดับ</th>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400; width: 15%;">ชื่อ</th>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400; width: 15%;">นามสกุล</th>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400; width: 15%;">ชื่อผู้ใช้งาน</th>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400; width: 15%;">ประเภท</th>
                                <th class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400; width: 10%;">แก้ไข</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row) { ?>
                                <tr>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['lastname']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php
                                        if ($row['type'] === 'admin') { //การใช้เครื่องหมาย === เพื่อเปรียบเทียบ Identical true if $a is equal to $b, and they are of the same type.
                                            echo '<span style="color:red;">' . htmlspecialchars($row['type']) . '</span>';
                                        } else {
                                            echo '<span style="color:green;">' . htmlspecialchars($row['type']) . '</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?php echo htmlspecialchars($row["user_id"]); ?>">
                                            Edit
                                        </button>
                                    </td>
                                </tr>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?php echo htmlspecialchars($row["user_id"]); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">จัดการผู้ใช้งาน</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                if (isset($errorMsg)) {
                                                ?>
                                                    <div class="alert alert-danger">
                                                        <strong><?php echo $errorMsg; ?></strong>
                                                    </div>
                                                <?php } ?>

                                                <?php
                                                if (isset($updateMsg)) {
                                                ?>
                                                    <div class="alert alert-success">
                                                        <strong><?php echo $updateMsg; ?></strong>
                                                    </div>
                                                <?php } ?>
                                                <form action="manage_users_db.php" class="TypeForm" method="POST">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($row["user_id"]); ?>">
                                                        <div class="mb-3">
                                                            <p>ชื่อผู้ใช้งาน : <?php echo htmlspecialchars($row["username"]); ?> </p>
                                                            <p>ชื่อ - นามสกุล : <?php echo htmlspecialchars($row["firstname"]) . ' ' . htmlspecialchars($row["lastname"]); ?></p>
                                                            <p>สิทธิ์การเข้าใช้งาน : <?php echo htmlspecialchars($row["type"]); ?> </p>
                                                            <hr>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="type" class="form-label">สิทธิ์การเข้าใช้งาน :</label>
                                                            <select class="form-select rounded-pill" name="type" required>
                                                                <option style="color:#006A67" value="editor" <?php if ($row["type"] == 'editor') echo "selected"; ?>> 🍏 editor</option>
                                                                <option style="color:#A34343" value="admin" <?php if ($row["type"] == 'admin') echo "selected"; ?>> 🍎 admin</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                        <button type="submit" name="manageuser" class="btn btn-success">บันทึก</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./js/jquery-3.7.1.min.js"></script>
        <script src="./js/sweetalert2.all.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".TypeForm").submit(function(e) {
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