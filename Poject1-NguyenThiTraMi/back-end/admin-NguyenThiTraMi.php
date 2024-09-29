<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/admin-NguyenThiTraMi-2210900041.css">
</head>
<body>
    <?php
        if(isset($_GET['action'])=='dangxuat') {
            unset($_SESSION["dangnhap"]);
            header('Location: login-NguyenThiTraMi.php');
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
                    <li class="active"><a href="#">Bảng điều khiến</a></li>
                    <li><a href="quanlydanhmuc-NguyenThiTraMi.php">Quản lý danh mục</a></li>
                    <li><a href="quanlykhachhang-NguyenThiTraMi.php">Quản lý khách hàng</a></li>
                    <li><a href="quanlysanpham-NguyenThiTraMi.php">Quản lý sản phẩm</a></li>
                    <li><a href="quanlydonhang-NguyenThiTraMi.php">Quản lý đơn hàng</a></li>
                    <li><a href="quanlydonhangchitiet-NguyenThiTraMi.php">Quản lý chi tiết đơn hàng</a></li>
                </ul>
            </div>  
        </div>
        <div class="admin-content-right">
            
        </div>
    </div>
</body>
</html>