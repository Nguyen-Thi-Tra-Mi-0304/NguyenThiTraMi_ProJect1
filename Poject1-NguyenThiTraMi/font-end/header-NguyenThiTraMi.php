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
<!--  Chức năng Đăng nhập -->
                <p id="connect_form_open"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Tài khoản</a>
                    <div class="connect_form">
                        <div class="connect_form_content">
                            <h2>Đăng nhập <span id="connect_form_close"><i class="fa fa-times" aria-hidden="true"></i></span></h2>
                            <?php
                                session_start();
                                include("./config/connect-NguyenThiTraMi.php");
                                if(isset($_POST["dangnhap"])) {
                                    $taikhoan = $_POST["email"];
                                    $matkhau = md5($_POST["matkhau"]);

                                    $sql_login = "SELECT * FROM tbl_dangky WHERE email ='$taikhoan' AND matkhau = '$matkhau' LIMIT 1";
                                    $res_login = $conn_nttm->query($sql_login);
                                    $count = mysqli_num_rows($res_login);
                                    if($count>0){
                                        $row_data = mysqli_fetch_array($res_login);
                                        $_SESSION["dangky"] = $taikhoan;
                                        $_SESSION["id_khachhang"] = $row_data['id_dangky'];
                                        echo "<p> Bạn đã đăng nhập thành công!";
                                        header("Location: customer-information-NguyenThiTraMi.php");
                                    }else{
                                        echo "<script>alert('Bạn đã nhập sai, vui lòng nhập lại email và mật khẩu!'); </script>";
                                    }
                                }
                            ?>
                            <form action="" autocomplete="off" method="post">
                                <div>
                                    <label for="email">Tài khoản: </label>
                                    <input type="email" id="email" name="email" placeholder="abc123@gmail.com">
                                </div>
                                <div>
                                    <label for="matkhau">Mật khẩu: </label>
                                    <input type="text" id="matkhau" name="matkhau">
                                </div>
                                <button type="submit" name="dangnhap">Đăng nhập</button>
                            </form>
                            <div class="connect_form_content_dk">
                                <p class="connect_content_dk"><a href="dangky-NguyenThiTraMi.php">Đăng ký</a></p>
                            </div>
                        </div>
                    </div>
                </p>   
            </div>
        </div>
</header>
