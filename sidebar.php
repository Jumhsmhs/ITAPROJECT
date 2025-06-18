
<?php
// session_start();
if (isset($_GET['year'])) {
    $_SESSION['budget_year'] = $_GET['year'];
}
$selected_year = isset($_SESSION['budget_year']) ? $_SESSION['budget_year'] : '2569';
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon ">
            <img src="./img/moph-logocov.gif" alt="" width="50" height="50">
        </div>
        <div class="sidebar-brand-text mx-3 mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400;">ITA <?= htmlspecialchars($selected_year); ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400;">หน้าหลัก</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
        Key Performance Indicator (KPI)
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" style="font-family: 'Mitr', sans-serif; font-weight: 300;">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span> ตัวชี้วัดที่ 1</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="tables1.php">MOIT 1</a>
                <a class="collapse-item" href="tables2.php">MOIT 2</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item" style="font-family: 'Mitr', sans-serif; font-weight: 300;">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-folder"></i>
            <span>ตัวชี้วัดที่ 2</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="tables3.php">MOIT 3</a>
                <a class="collapse-item" href="tables4.php">MOIT 4</a>
                <a class="collapse-item" href="tables5.php">MOIT 5</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" style="font-family: 'Mitr', sans-serif; font-weight: 300;">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>ตัวชี้วัดที่ 3</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="tables6.php">MOIT 6</a>
                <a class="collapse-item" href="tables7.php">MOIT 7</a>
                <a class="collapse-item" href="tables8.php">MOIT 8</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" style="font-family: 'Mitr', sans-serif; font-weight: 300;">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
            aria-expanded="true" aria-controls="collapsePages2">
            <i class="fas fa-fw fa-folder"></i>
            <span>ตัวชี้วัดที่ 4</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="tables9.php">MOIT 9</a>
                <a class="collapse-item" href="tables10.php">MOIT 10</a>
                <a class="collapse-item" href="tables11.php">MOIT 11</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" style="font-family: 'Mitr', sans-serif; font-weight: 300;">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
            aria-expanded="true" aria-controls="collapsePages3">
            <i class="fas fa-fw fa-folder"></i>
            <span>ตัวชี้วัดที่ 5</span>
        </a>
        <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="tables12.php">MOIT 12</a>
                <a class="collapse-item" href="tables13.php">MOIT 13</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" style="font-family: 'Mitr', sans-serif; font-weight: 300;">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages4"
            aria-expanded="true" aria-controls="collapsePages4">
            <i class="fas fa-fw fa-folder"></i>
            <span>ตัวชี้วัดที่ 6</span>
        </a>
        <div id="collapsePages4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="tables14.php">MOIT 14</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" style="font-family: 'Mitr', sans-serif; font-weight: 300;">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages5"
            aria-expanded="true" aria-controls="collapsePages5">
            <i class="fas fa-fw fa-folder"></i>
            <span>ตัวชี้วัดที่ 7</span>
        </a>
        <div id="collapsePages5" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="tables15.php">MOIT 15</a>
                <a class="collapse-item" href="tables16.php">MOIT 16</a>
                <a class="collapse-item" href="tables17.php">MOIT 17</a>
                <a class="collapse-item" href="tables18.php">MOIT 18</a>
                <a class="collapse-item" href="tables19.php">MOIT 19</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" style="font-family: 'Mitr', sans-serif; font-weight: 300;">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages6"
            aria-expanded="true" aria-controls="collapsePages6">
            <i class="fas fa-fw fa-folder"></i>
            <span>ตัวชี้วัดที่ 8</span>
        </a>
        <div id="collapsePages6" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="tables20.php">MOIT 20</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" style="font-family: 'Mitr', sans-serif; font-weight: 300;">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages7"
            aria-expanded="true" aria-controls="collapsePages7">
            <i class="fas fa-fw fa-folder"></i>
            <span>ตัวชี้วัดที่ 9</span>
        </a>
        <div id="collapsePages7" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="tables21.php">MOIT 21</a>
                <a class="collapse-item" href="tables22.php">MOIT 22</a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>