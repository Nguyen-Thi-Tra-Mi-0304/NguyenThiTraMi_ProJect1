<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fahasa</title>
    <link rel="stylesheet" href="./css/main_NguyenThiTraMi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>
        <div class="header-banner">
            <img src="./img/header/NCCDinhTiT1131_Header_1263x60.jpg" alt="banner">
        </div>
        <div class="header-content">
            <div class="header-logo">
                <a href="main-NguyenThiTraMi.php"><img src="./img/header/fahasa-logo.png" alt="logo"></a>
            </div>
            <div class="header-memu">
                <ul class="menu">
                    <li><a href="main-NguyenThiTraMi.php">Trang chủ</a></li>
                    <li><a href="./gioithieu-NguyenThiTraMi.php">Giới thiệu</a></li>
                </ul>
            </div>
            <div class="header-search">
                <form action="search-NguyenThiTraMi.php?quanly=timkiem" method="get">
                    <input type="search" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
                    <input type="submit" name="timkiem" class="submit-product" value="Tìm">
                </form> 
            </div>
            <div class="header-icon">
                <p><a href="cart-NguyenThiTraMi.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng</a></p>
                <?php
                     if(isset($_GET['action'])=='dangxuat') {
                        unset($_SESSION["dangnhap"]);
                        header('Location: main-NguyenThiTraMi.php');
                    }
                ?>
                <p><a href="main-NguyenThiTraMi.php?action=dangxuat"><i class="fa fa-user" aria-hidden="true"></i> Đăng xuất</a></p>   
            </div>
        </div>
</header>
<div class="customer-content">
<?php
    session_start();
    include("./config/connect-NguyenThiTraMi.php");

    // Check if the user is logged in
    if(isset($_SESSION["dangky"])) {
        $taikhoan = $_SESSION["dangky"];

        // Fetch customer information
        $sql_customer_info = "SELECT * FROM tbl_dangky WHERE email = '$taikhoan'";
        $res_customer_info = $conn_nttm->query($sql_customer_info);

        if($res_customer_info->num_rows > 0) {
            $customer_info = $res_customer_info->fetch_assoc();

            // Display customer information
            echo '<h1>Chào mừng, ' . $customer_info["tenkhachhang"] . '</h1>';
            echo '<p>Email: ' . $customer_info["email"] . '</p>';
            echo '<p>Mật khẩu: ' . $customer_info["matkhau"] . '</p>';
            echo '<p>Điện thoại: ' . $customer_info["dienthoai"] . '</p>';
            echo '<p>Địa chỉ: ' . $customer_info["diachi"] . '</p>';
            echo '<p>Ngày sinh: ' . $customer_info["ngaysinh"] . '</p>';
            echo '<p>Giới tính: ' . $customer_info["gioitinh"] . '</p>';
        } else {
            echo '<p style="color:red;">Error fetching customer information</p>';
        }
    } else {
        // If the user is not logged in, redirect to the login page
        header("Location: main-NguyenThiTraMi.php");
        exit();
    }
?>
</div>
<?php
    include("footer-NguyenThiTraMi.php");
?>
</body>
</html>