
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon ">
            <img src="./img/moph-logocov.gif" alt="" width="50" height="50">
        </div>
        <div class="sidebar-brand-text mx-3 mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400; font-size:0.8rem;">ITA Upload</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400;">Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
        Key Performance Indicator (KPI)
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="doc_file.php"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-paper-plane"></i>
            <span> ไตรมาส 1</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="doc_file2.php"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-paper-plane"></i>
            <span> ไตรมาส 2</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="doc_file3.php"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-paper-plane"></i>
            <span> ไตรมาส 3</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="doc_file4.php"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-paper-plane"></i>
            <span> ไตรมาส 4</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
        </div>
    </li>
    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin'): ?>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Heading -->
        <div class="sidebar-heading mitr-light" style="font-family: 'Mitr', sans-serif; font-weight: 400;">
            Management Doc and Users
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="doc_file_add.php"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa fa-file"></i>
                <span> เพิ่มเอกสาร </span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="doc_file_del.php"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa fa-file"></i>
                <span> จัดการเอกสาร </span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="manage_users.php"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa fa-users"></i>
                <span> จัดการผู้ใช้งาน </span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="register.php"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa fa-user-plus"></i>
                <span> เพิ่มผู้ใช้งาน </span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
            </div>
        </li>
    <?php endif; ?>
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" onclick="confirmLogout(event)"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-reply-all"></i>
            <span> ออกจากระบบ </span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
        </div>
    </li>


    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<!-- โหลด SweetAlert2 ถ้ายังไม่ได้ใส่ -->
<script src="./js/sweetalert2@11.js"></script>

<script>
function confirmLogout(event) {
    event.preventDefault(); // ป้องกันลิงก์เปลี่ยนหน้าโดยตรง

    Swal.fire({
        title: 'คุณแน่ใจหรือไม่?',
        text: "คุณต้องการออกจากระบบหรือไม่",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'ใช่, ออกจากระบบ',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'logout.php'; // เปลี่ยนหน้าไปยัง logout จริง
        }
    });
}
</script>
