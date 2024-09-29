<?php
    session_start();
    include("./connect-NguyenThiTraMi.php");
    if(isset($_POST["dangnhap"])) {
        $taikhoan = $_POST["taikhoan"];
        $matkhau = md5($_POST["matkhau"]);

        $sql_login = "SELECT * FROM tbl_admin WHERE username ='$taikhoan' AND password_admin = '$matkhau' LIMIT 1";
        $res_login = $conn_nttm->query($sql_login);
        $count = mysqli_num_rows($res_login);
        if($count>0){
            $_SESSION["dangnhap"] = $taikhoan;
            header("Location: admin-NguyenThiTraMi.php");
        }else{
            echo "<script>alert('Tài khoàn và Mật khẩu không đúng, vui lòng nhập lại'); </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập admin</title>
    <link rel="stylesheet" href="./css/login-NguyenThiTraMi.css">
</head>
<body>
    <div class="connect_form">
        <div class="connect_form_content">
        <h2>Đăng nhập <span id="connect_form_close"><i class="fa fa-times" aria-hidden="true"></i></span></h2>
        <form action="" autocomplete="off" method="post">
            <div>
                <label for="taikhoan">Tài khoản: </label>
                <input type="email" id="taikhoan" name="taikhoan" placeholder="abc123@gmail.com">
            </div>
            <div>
                <label for="matkhau">Mật khẩu: </label>
                <input type="text" id="matkhau" name="matkhau">
            </div>
            <button type="submit" name="dangnhap">Đăng nhập</button>
        </form>
        </div>
    </div>
</body>
</html>