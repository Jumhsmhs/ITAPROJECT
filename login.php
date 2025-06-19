
<!-- index.php -->
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


    <!-- Bootstrap + SweetAlert2 -->
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/sweetalert2.all.min.js"></script>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }
    </style>
</head>

<body class="bg-gradient-light d-flex justify-content-center align-items-center"">

    <div class=" container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image ">
                            <img src="./img/banner_login.png" alt="Girl in a jacket" height="500">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center mt-5">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome! ITA Ban Sang</h1>
                                </div>
                                <form class="user mt-5" id="loginForm" method="POST" action="login_db.php">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="username" name="username"
                                            placeholder="Enter Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                        id="password" name="password" placeholder="Enter Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" onclick="togglePassword()">
                                            <label class="custom-control-label" for="customCheck">Show Password</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary tn-user btn-block rounded-pill">Login</button>

                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        function togglePassword() {
            var pass = document.getElementById("password_ita");
            pass.type = pass.type === "password" ? "text" : "password";
        }

        $(document).ready(function() {
            $('#loginForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    data: $(this).serialize(),
                    success: function(data) {
                        try {
                            const result = JSON.parse(data);
                            if (result.status === "success") {
                                Swal.fire("เข้าสู่ระบบสำเร็จ", result.msg, "success").then(function() {
                                    window.location.href = "dashboard.php";
                                });
                            } else {
                                Swal.fire("เกิดข้อผิดพลาด", result.msg, "error");
                            }
                        } catch (err) {
                            Swal.fire("ข้อผิดพลาด", "ไม่สามารถประมวลผลข้อมูลได้", "error");
                        }
                    },
                    error: function() {
                        Swal.fire("ล้มเหลว", "ไม่สามารถเชื่อมต่อกับเซิร์ฟเวอร์ได้", "error");
                    }
                });
            });
        });
    </script>

</body>

</html>