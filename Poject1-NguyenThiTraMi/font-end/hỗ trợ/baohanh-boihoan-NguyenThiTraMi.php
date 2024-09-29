<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chính sách bảo hành - bồi hoàn</title>
    <link rel="stylesheet" href="./css/Nguyen-Thi-Tra-Mi-2210900041_hotro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>
        <div class="header-banner">
            <img src="../img/header/NCCDinhTiT1131_Header_1263x60.jpg" alt="banner">
        </div>
        <div class="header-content">
            <div class="header-logo">
                <a href="main-NguyenThiTraMi.php"><img src="../img/header/fahasa-logo.png" alt="logo"></a>
            </div>
            <div class="header-memu">
                <ul class="menu">
                    <li><a href="main-NguyenThiTraMi.php">Trang chủ</a></li>
                    <li><a href="./gioithieu-NguyenThiTraMi.php">Giới thiệu</a></li>
                    <li>
                        <a href="">Hỗ trợ
                            <i class="nav-arrow-down fa fa-caret-down" aria-hidden="true"></i>
                        </a>
                        <ul class="submenu">
                            <li><a href="./hỗ trợ/baohanh-boihoan-NguyenThiTraMi.php">Chính sách bảo hành và bồi hoàn</a></li>
                            <li><a href="./hỗ trợ/vanchuyen-NguyenThiTraMi.php">Chính sách vận chuyển</a></li>
                            <li><a href="./hỗ">Chính sách khách sỉ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="header-search">
                <form action="search-NguyenThiTraMi.php?quanly=timkiem" method="get">
                    <input type="search" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
                    <input type="submit" name="timkiem" class="submit-product" value="Tìm">
                </form> 
            </div>
            <div class="header-icon">
                <p><a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng</a></p>
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
                                        $_SESSION["dangky"] = $taikhoan;
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
                                <p class="connect_content_dk"><a href="dangky.html">Đăng ký</a></p>
                            </div>
                        </div>
                    </div>
                </p>   
            </div>
        </div>
</header>

<section>
    <!-- <div class="main"> -->
        <div id="content">
            <div class="content_text">
                <h1>CHÍNH SÁCH BẢO HÀNH – BỒI HOÀN</h1>
                <h5>Áp dụng cho toàn bộ đơn hàng của Quý Khách tại Fahasa.com</h5>
                <p class="caption">1. Tôi có thể bảo hành sản phẩm tại đâu?</p>
                <p>- Bảo hành chính hãng: Đối với các sản phẩm điện tử, đồ chơi điện tử,... có tem phiếu cam kết bảo hành từ Hãng, khách hàng có thể mang sản phẩm đến trực tiếp Hãng để bảo hành mà không cần thông qua Fahasa.com.</p>
                <p>- Bảo hành thông qua Fahasa.com: khách hàng liên hotline 1900636467 hoặc truy cập www.fahasa.com/chinh-sach-bao-hanh-san-pham để được hỗ trợ tư vấn về thực hiện bảo hành.</p>
                <p class="caption">2. Tôi có thể được bảo hành sản phẩm miễn phí không?</p>
                <p>Sản phẩm của quý khách được bảo hành miễn phí chính hãng khi:</p>
                <ul>
                    <li>Còn thời hạn bảo hành (dựa trên tem/phiếu bảo hành hoặc thời điểm kích hoạt bảo hành điện tử).</li>
                    <li>Tem/phiếu bảo hành còn nguyên vẹn.</li>
                    <li>Sản phẩm bị lỗi kỹ thuật.</li>
                </ul>
                <p>Các trường hợp có thể phát sinh phí bảo hành:</p>
                <ul>
                    <li>Sản phẩm hết thời hạn bảo hành.</li>
                    <li>Sản phẩm bị bể, biến dạng, cháy, nổ, ẩm thấp trong động cơ hoặc hư hỏng trong quá trình sử dụng.</li>
                    <li>Sản phẩm bị hư hỏng do lỗi của người sử dụng, không xuất phát từ lỗi vốn có của hàng hóa.</li>
                </ul>
                <p class="caption">3. Sau bao lâu tôi có thể nhận lại sản phẩm bảo hành?</p>
                <p>Nếu sản phẩm của quý khách vẫn còn trong thời hạn bảo hành trên team phiếu bảo hành của Hãng, Fahasa khuyến khích quý khách gửi trực tiếp đến trung tâm của Hãng để được hỗ trợ bảo hành trong thời gian nhanh nhất.</p>
                <p>Trường hợp quý khách gửi hàng về Fahasa.com, thời gian bảo hành dự kiến trong vòng 21- 45 ngày tùy thuộc vào điều kiện sẵn có của linh kiện thay thế từ nhà sản xuất/lỗi sản phẩm (không tính thời gian vận chuyển đi và về). Đối với sản phẩm</p>
                <p class="caption">4. Fahasa.com bảo hành bằng các hình thức nào?</p>
                <p>Sản phẩm tại Fahasa.com sẽ được bảo hành bằng 1 trong 4 hình thức sau:</p>
                <ul>
                    <li>Hóa đơn: khách hàng mang theo hóa đơn trực tiếp hoặc hóa đơn giá trị gia tăng có thông tin của sản phẩm để được bảo hành.</li>
                    <li>Phiếu bảo hành: đi kèm theo sản phẩm, có đầy đủ thông tin về nơi bảo hành và điều kiện bảo hành.</li>
                    <li>Tem bảo hành: loại tem đặc biệt chỉ sử dụng một lần, được dán trực tiếp lên sản phẩm. Sản phẩm còn trong thời hạn bảo hành phải thỏa điều kiện tem còn nguyên vẹn và thời gian bảo hành phải trước ngày được viết trên tem.</li>
                    <li>Điện tử: là chế độ bảo hành sản phẩm trực tuyến thay thế cho phương pháp bảo hành thông thường bằng giấy hay thẻ bảo hành bằng cách: nhắn tin SMS kích hoạt, quét mã QR-Code từ tem nhãn, đăng ký trên website hoặc bằng ứng dụng bảo hành.</li>
                </ul>
                <p class="caption">5. Fahasa.com có bảo hành quà tặng kèm sản phẩm không?</p>
                <p><span>Fahasa.com </span> rất tiếc hiện chưa hỗ trợ bảo hành quà tặng đi kèm sản phẩm chính. </p>
                <p> <span>Lưu ý</span>: Để đảm bảo quyền lợi khách hàng và <span>Fahasa.com</span>có cơ sở làm việc với các bộ phận liên quan, tất cả yêu cầu bảo hành quý khách cần cung cấp hình ảnh/clip sản phẩm lỗi. <span>Fahasa.com</span> xin phép từ chối khi chưa nhận đủ thông tin hình ảnh từ quý khách. </p>
                <p class="last"> Chính sách sẽ được áp dụng và có hiệu lực từ ngày01/08/2022</p>
            </div>
        </div>
    <!-- </div> -->
</section>

<?php
    include("../footer-NguyenThiTraMi.php");
?>

<script>
    //Tạo đóng mở Tài khoản (Đăng nhập)---------------------------------------------------------------------------------
        const connectopen = document.querySelector('#connect_form_open')
        const connectclose = document.querySelector('#connect_form_close')
        
        // console.log(connectbtn)
        connectopen.addEventListener("click", function(){
        document.querySelector('.connect_form').style.display = "flex"
        })
        connectclose.addEventListener("click", function(){
        document.querySelector('.connect_form').style.display = "none"
        })
</script>
</body>
</html>