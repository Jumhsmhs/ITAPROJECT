function confirmLogout() {
    Swal.fire({
        title: 'คุณต้องการออกจากระบบ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#B7B7B7',
        confirmButtonText: 'ออกจากระบบ',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'logout.php'; // ส่งไปหน้า logout เพื่อเคลียร์ session
        }
    });
}