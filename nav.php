<?php
// session_start();
if (isset($_GET['year'])) {
    $_SESSION['budget_year'] = $_GET['year'];
}
$selected_year2 = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
?>
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="alertsDropdown"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <div class="border border-primary rounded px-3 py-2 bg-light d-inline-flex align-items-center shadow-sm">
                    <span class="text-primary small">ปีงบประมาณ</span>
                    <span class="font-weight-bolder mb-0 text-dark ml-2"><?= htmlspecialchars($selected_year2) ?></span>
                </div>
            </a>

            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header" style="font-weight:400;">
                    แยกตามปีงบประมาณ
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="?year=2569">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-layer-group"></i>
                        </div>
                    </div>
                    <div>
                        <span class="font-weight-Medium">MOIT 2569</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="?year=2570">
                    <div class="mr-3">
                        <div class="icon-circle bg-info">
                            <i class="fas fa-layer-group"></i>
                        </div>
                    </div>
                    <div>
                        <span class="font-weight-Medium">MOIT 2570</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="?year=2571">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-layer-group"></i>
                        </div>
                    </div>
                    <div>
                        <span class="font-weight-Medium">MOIT 2571</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="?year=2572">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-layer-group"></i>
                        </div>
                    </div>
                    <div>
                        <span class="font-weight-Medium">MOIT 2572</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="?year=2573">
                    <div class="mr-3">
                        <div class="icon-circle bg-danger">
                            <i class="fas fa-layer-group"></i>
                        </div>
                    </div>
                    <div>
                        <span class="font-weight-Medium">MOIT 2573</span>
                    </div>
                </a>
            </div>
        </li>
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>


        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?php echo  $row['firstname'] . " " . $row['lastname'];
                    ?>
                </span>
                <img class="img-profile rounded-circle"
                    src="img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="./logout.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>