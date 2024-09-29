<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="./css/admin-NguyenThiTraMi-2210900041.css">
</head>
<body>
    <?php
        include("./connect-NguyenThiTraMi.php");

        if(isset($_POST["Themsanpham"])) {
            $ma_sanpham = $_POST["ma_sanpham"];
            $ten_sanpham = $_POST["ten_sanpham"];
            $gia_sanpham = $_POST["gia_sanpham"];
            $noidung_sanpham = $_POST["noidung_sanpham"];
            $tinhtrang_sanpham = $_POST["tinhtrang_sanpham"];
            $id_danhmuc = $_POST["id_danhmuc"];
            // xử lý hình ảnh
            $anh_sanpham = $_FILES["anh_sanpham"]["name"];
            $anh_sanpham_tmp = $_FILES["anh_sanpham"]["tmp_name"];
            $anh_sanpham_name = time().'_'.$anh_sanpham;
            move_uploaded_file($anh_sanpham_tmp,'./uploads/'.$anh_sanpham);

            $sql_insert_nttm = "INSERT INTO tbl_sanpham (`ma_sanpham`,`ten_sanpham`,`gia_sanpham`,`noidung_sanpham`,`anh_sanpham`,`id_danhmuc`,`tinhtrang_sanpham`) 
            VALUES ('$ma_sanpham','$ten_sanpham','$gia_sanpham','$noidung_sanpham','$anh_sanpham','$id_danhmuc','$tinhtrang_sanpham');";
            if($conn_nttm->query($sql_insert_nttm)){
                header("Location: ./quanlysanpham/sanpham-list-NguyenThiTraMi.php");
            }else {
                $error_message_nttm = "Lỗi thêm mới!".mysqli_errno($conn_nttm);
            }
        }    
    ?>
    <div class="admin-content">
        <div class="admin-content-left">
            <div class="admin-content-left-top">
                <img src="./img/fahasa-logo.png" alt="">
                <h3>Xin chào Nguyễn Thị Trà Mi</h3>
                <h3>Chúc bạn một ngày mới tốt lành &#9786;</h3>
            </div>
            <div class="admin-conent-left-bottom">
            <li class="admin-out"><a href="admin-NguyenThiTraMi.php?action=dangxuat">Đăng xuất</a></li>
                <ul class="admin-content-left-menu">
                    <li><a href="admin-NguyenThiTraMi.php">Bảng điều khiến</a></li>
                    <li><a href="quanlydanhmuc-NguyenThiTraMi.php">Quản lý danh mục</a></li>
                    <li><a href="quanlykhachhang-NguyenThiTraMi.php">Quản lý khách hàng</a></li>
                    <li class="active"><a href="#">Quản lý sản phẩm</a></li>
                    <li><a href="quanlydonhang-NguyenThiTraMi.php">Quản lý đơn hàng</a></li>
                    <li><a href="quanlydonhangchitiet-NguyenThiTraMi.php">Quản lý chi tiết đơn hàng</a></li>
                </ul>
            </div>  
        </div>
        <div class="admin-content-right">
            <div class="admin-content-right-title">
                <h1>Quản lý sản phẩm</h1>
            </div>
            <div class="admin-content-right-content">
                <a href="./quanlysanpham/sanpham-list-NguyenThiTraMi.php" class="btn">Danh sách sản phẩm</a>
                <h1>Thêm sản phẩm</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <table style="width: 80%;">
                        <tr>
                            <td><label for="ma_sanpham">Mã sản phẩm: </label></td>
                            <td><input required type="text" name="ma_sanpham" id="ma_sanpham"></td>
                        </tr>
                        <tr>
                            <td><label for="ten_sanpham">Tên sản phẩm: </label></td>
                            <td><input required type="text" name="ten_sanpham" id="ten_sanpham"></td>
                        </tr>
                        <tr>
                            <td><label for="gia_sanpham">Giá sản phẩm: </label></td>
                            <td><input required type="text" name="gia_sanpham" id="gia_sanpham"></td>
                        </tr>
                        <tr>
                            <td><label for="noidung_sanpham">Mô tả sản phẩm: </label></td>
                            <td><textarea name="noidung_sanpham" id="noidung_sanpham" cols="52" rows="10" style="resize: none;"></textarea></td>
                        </tr>
                        <tr>
                            <td>Hình ảnh sản phẩm: </td>
                            <td><input type="file" name="anh_sanpham"><td>
                        </tr>
                        <tr>
                            <td><label for="id_danhmuc">Danh mục sản phẩm: </label></td>
                            <td>
                                <select name="id_danhmuc">
                                    <option value="#">--Chọn danh mục--</option>
                                    <?php
                                        $sql_dm_nttm = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                                        $res_dm_nttm = $conn_nttm->query($sql_dm_nttm);
                                        while($row_dm_nttm = $res_dm_nttm->fetch_array()):
                                    ?>
                                    <option value="<?php echo $row_dm_nttm["id_danhmuc"]; ?>">
                                        <?php echo $row_dm_nttm["ten_danhmuc"]; ?> 
                                    </option>
                                    <?php
                                        endwhile;
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="tinhtrang_sanpham">Tình trạng: </label></td>
                            <td>
                                <select name="tinhtrang_sanpham">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Ngừng hoạt động</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class="btn" name="Themsanpham" style="width: 100px;" value="Thêm"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>