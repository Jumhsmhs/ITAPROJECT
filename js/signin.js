
$(document).ready(function () {
    $("#loginForm").submit(function (e) {
        e.preventDefault();

        let formUrl = $(this).attr("action");
        let reqMethod = $(this).attr("method");
        let formData = $(this).serialize();

        $.ajax({
            url: formUrl,
            type: reqMethod,
            data: formData,
            success: function (data) {
                let result = JSON.parse(data);
                if (result.status == "success") {
                    console.log("Success", result);

                    // ตรวจสอบประเภทผู้ใช้
                    if (result.user_type == "admin") {
                        Swal.fire("เข้าสู่ระบบสำเร็จ!", result.msg, result.status).then(function () {
                            window.location.href = "adminPanel.php"; // เปลี่ยนเส้นทางไปยังหน้าผู้ดูแลระบบ
                        });
                    } else if (result.user_type == "user") {
                        Swal.fire("เข้าสู่ระบบสำเร็จ!", result.msg, result.status).then(function () {
                            window.location.href = "user.php"; // เปลี่ยนเส้นทางไปยังหน้าผู้ใช้งานปกติ
                        });

                    } else if (result.user_type == "passfail") {
                        Swal.fire("ไม่สามารถเข้าสู่ระบบได้!", result.msg, result.status).then(function () {
                            window.location.href = "signin.php"; // แสดง password ไม่ถูกต้อง
                        });
                    } else if (result.user_type == "userfail") {
                        Swal.fire("ไม่สามารถเข้าสู่ระบบได้!", result.msg, result.status).then(function () {
                            window.location.href = "signin.php"; // แสดง username ไม่ถูกต้อง
                        });
                    }
                } else {
                    console.log("Error", result);
                    Swal.fire("ล้มเหลว!", result.msg, result.status);
                }
            }
        })
    })
})

// แสดงหรัสผ่านในการกรอก
function showPass() {
    let myPass2 = document.getElementById('myPass2');
    if (myPass2.type === "password") {
        myPass2.type = "text";
    } else {
        myPass2.type = "password";
    }
}
