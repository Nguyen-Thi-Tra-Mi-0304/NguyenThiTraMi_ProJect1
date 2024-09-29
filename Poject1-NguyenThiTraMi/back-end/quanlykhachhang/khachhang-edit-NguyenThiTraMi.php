<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="./style-khachhang.css">
</head>
<body>
    <?php
        include("../connect-NguyenThiTraMi.php");

        if(isset($_GET['id_dk'])) {
            $id_khachhang = $_GET["id_dk"];
            $sql_edit_nttm = "SELECT * FROM tbl_dangky WHERE id_khachhang = '$id_khachhang' ";
            $res_edit_nttm = $conn_nttm->query($sql_edit_nttm);
            $row_edit_nttm = $res_edit_nttm->fetch_array();
        }else{
            header("Location: ../quanlykhachhang-NguyenThiTraMi.php");
        } 
        if(isset($_POST["Suasanpham"])) {
            $tenkhachhang = $_POST['tenkhachhang'];
            $dienthoai = $_POST['dienthoai'];
            $diachi = $_POST['diachi'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $email = $_POST['email'];
            $matkhau = md5($_POST['matkhau']);

            $sql_update_nttm = "UPDATE tbl_dangky SET ";
            $sql_update_nttm .="tenkhachhang = '$tenkhachhang', ";
            $sql_update_nttm .="dienthoai = '$dienthoai', ";
            $sql_update_nttm .="diachi = '$diachi', ";
            $sql_update_nttm .="ngaysinh = '$ngaysinh', ";
            $sql_update_nttm .="gioitinh = '$gioitinh', ";
            $sql_update_nttm .="email = '$email', ";
            $sql_update_nttm .="matkhau = '$matkhau' ";
            $sql_update_nttm .="WHERE id_khachhang = '$id_khachhang' ";
            if($conn_nttm->query($sql_update_nttm)) {
                header("Location: ../quanlykhachhang-NguyenThiTraMi.php");
            }else{
                $error_message_nttm = "Lỗi sửa dữ liệu!".mysqli_errno($conn_nttm);
            }
            
        }
    ?>
    <div class="admin-content">
        <div class="admin-content-top">
            <a href="../quanlykhachhang-NguyenThiTraMi.php" class="btn" style="width: 200px;">Danh sách danh mục</a>
            <h2>Quản lý sản phẩm</h2>
        </div>
        <div class="admin-content-bottom-sua">
            <h2>Sửa sản phẩm</h2>
            <form action="" method="post" enctype="multipart/form-data">
            <table style="width: 80%;">
                <tr>
                    <td><label for="tenkhachhang">Họ và tên: </label></td>
                    <td><input required type="text" name="tenkhachhang" id="tenkhachhang"
                    value="<?php echo $row_edit_nttm["tenkhachhang"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="dienthoai">Điện thoại: </label></td>
                    <td><input required type="text" name="dienthoai" id="dienthoai"
                    value="<?php echo $row_edit_nttm["dienthoai"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="diachi">Điạ chỉ: </label></td>
                    <td><input required type="text" name="diachi" id="diachi"
                    value="<?php echo $row_edit_nttm["diachi"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="ngaysinh">Ngày sinh: </label></td>
                    <td><input required type="date" name="ngaysinh" id="ngaysinh"
                    value="<?php echo $row_edit_nttm["ngaysinh"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="gioitinh">Giới tính: </label></td>
                    <td>
                        <select name="gioitinh" style="width: 100px">
                        <?php
                            if($row_edit_nttm['gioitinh']==1) {
                        ?>
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        <?php
                            }else{
                        ?>
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        <?php
                            }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email: </label></td>
                    <td><input required type="email" name="email" id="email"
                    value="<?php echo $row_edit_nttm["email"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="matkhau">Mật khẩu: </label></td>
                    <td><input required type="text" name="matkhau" id="matkhau"
                    value="<?php echo $row_edit_nttm["matkhau"]; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn" name="Suasanpham" style="width: 100px; height:40px" value="Sửa"></td>
                </tr>
            </table>
                </form>
        </div>
    </div>
</body>
</html>