<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="./css/main_NguyenThiTraMi.css">
</head>
<body>
    <?php
        include("./config/connect-NguyenThiTraMi.php");
        if(isset($_POST['dangky'])) {
            $tenkhachhang = $_POST['tenkhachhang'];
            $dienthoai = $_POST['dienthoai'];
            $diachi = $_POST['diachi'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $email = $_POST['email'];
            $matkhau = md5($_POST['matkhau']);

            $sql_dk_nttm = "INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhachhang`, `dienthoai`, `diachi`, `email`, `matkhau`,`gioitinh`,`ngaysinh`) 
            VALUES (NULL, '$tenkhachhang', '$dienthoai', '$diachi', '$email', '$matkhau', '$gioitinh', '$ngaysinh');";
            $res_dk_nttm = $conn_nttm->query($sql_dk_nttm);
            if($sql_dk_nttm){
                echo '<p style = "color: red;"> Bạn đã đăng ký thành công!</p>';
                $_SESSION['dangky'] = $tenkhachhang;

                $_SESSION['id_khachhang'] = mysqli_insert_id($conn_nttm);
            }
        }
    ?>
    <div class="login-content">
    <a href="main-NguyenThiTraMi.php" class="btn">Quay trở lại trang chủ</a>
        <h1>Đăng ký thành viên</h1>
        <form action="" method="post">
            <table style="width: 80%;">
                <tr>
                    <td><label for="tenkhachhang">Họ và tên: </label></td>
                    <td><input required type="text" name="tenkhachhang" id="tenkhachhang"></td>
                </tr>
                <tr>
                    <td><label for="dienthoai">Điện thoại: </label></td>
                    <td><input required type="text" name="dienthoai" id="dienthoai"></td>
                </tr>
                <tr>
                    <td><label for="diachi">Điạ chỉ: </label></td>
                    <td><input required type="text" name="diachi" id="diachi"></td>
                </tr>
                <tr>
                    <td><label for="ngaysinh">Ngày sinh: </label></td>
                    <td><input required type="date" name="ngaysinh" id="ngaysinh"></td>
                </tr>
                <tr>
                    <td><label for="gioitinh">Giới tính: </label></td>
                    <td>
                        <select name="gioitinh" style="width: 100px">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input required type="email" name="email" id="email"></td>
                </tr>
                <tr>
                    <td><label for="matkhau">Mật khẩu: </label></td>
                    <td><input required type="text" name="matkhau" id="matkhau"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn" name="dangky" style="width: 100px;" value="Đăng ký"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>