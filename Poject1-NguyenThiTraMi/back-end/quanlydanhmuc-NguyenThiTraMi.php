<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh mục</title>
    <link rel="stylesheet" href="./css/admin-NguyenThiTraMi-2210900041.css">
</head>
<body>
    <?php 
    include("./connect-NguyenThiTraMi.php");
    if(isset($_POST['Themdanhmuc'])) {
        $ten_danhmuc = $_POST["ten_danhmuc"];
        $thutu_danhmuc = $_POST["thutu_danhmuc"];

        $sql_insert_nttm = "INSERT INTO tbl_danhmuc (`ten_danhmuc`, `thutu_danhmuc`) 
        VALUES ('$ten_danhmuc', '$thutu_danhmuc');";
        if($conn_nttm->query($sql_insert_nttm)){
            header("Location: ./quanlydanhmuc/danhmuc-list-NguyenThiTraMi.php");
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
                    <li class="active"><a href="#">Quản lý danh mục</a></li>
                    <li><a href="quanlykhachhang-NguyenThiTraMi.php">Quản lý khách hàng</a></li>
                    <li><a href="quanlysanpham-NguyenThiTraMi.php">Quản lý sản phẩm</a></li>
                    <li><a href="quanlydonhang-NguyenThiTraMi.php">Quản lý đơn hàng</a></li>
                    <li><a href="quanlydonhangchitiet-NguyenThiTraMi.php">Quản lý chi tiết đơn hàng</a></li>
                </ul>
            </div>  
        </div>
        <div class="admin-content-right">
            <div class="admin-content-right-title">
                <h1>Quản lý danh mục</h1>
            </div>
            <div class="admin-content-right-content">
                <a href="./quanlydanhmuc/danhmuc-list-NguyenThiTraMi.php" class="btn">Danh sách danh mục</a>
                <h1>Thêm danh mục sản phẩm</h1>
                <form action="" method="post">
                    <table style="width: 80%;">
                        <tr>
                            <td><label for="ten_danhmuc">Tên danh mục: </label></td>
                            <td><input required type="text" name="ten_danhmuc" id="ten_danhmuc" style="padding-left: 12px;"></td>
                        </tr>
                        <tr>
                            <td><label for="thutu_danhmuc">Thứ tự danh mục: </label></td>
                            <td><input required type="text" name="thutu_danhmuc" id="thutu_danhmuc" style="padding-left: 12px; height: 30px; width: 400px;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class="btn" name="Themdanhmuc" style="width: 100px;" value="Thêm"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>