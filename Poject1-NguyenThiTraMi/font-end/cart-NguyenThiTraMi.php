<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/main_NguyenThiTraMi.css">
</head>
<?php
    include("header-NguyenThiTraMi.php")
?>
<!-- Begin: content-->
<?php 
    if(isset($_SESSION['cart'])) {
        // echo '<pre>';
        // print_r($_SESSION['cart']);
        // echo '</pre>';
    }
?>
<section id="cart">
    <div class="container">
        <div class="cart_top_warp">
            <div class="cart_top">
                <div class="cart_top_cart cart_top_item">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="cart_top_address cart_top_item">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="cart_top_payment cart_top_item">
                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="cart_content row">
            <div class="cart_content_left">
                <?php
                    if(isset($_SESSION['dangky'])){
                        echo "Xin chào: ", '<span style="color:red;">'.$_SESSION['dangky'].'</span>';
                        // echo '$_SESSION["id_khachhang"]';
                    }
                ?>
                <table style="width: 100%;">
                    <tr>
                        <th>STT</th>
                        <th>ID sản phẩm</th>
                        <th>Mã sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                    <?php
                        if(isset($_SESSION['cart'])) {
                            $stt_nttm = 0; 
                            $tongtien = 0; 
                            foreach($_SESSION['cart'] as $cart_item) {
                                $stt_nttm++; 
                                $thanhtien = $cart_item['soluong_sanpham']*$cart_item['gia_sanpham'];
                                $tongtien = $tongtien+$thanhtien;
                    ?>
                    <tr>
                        <td><?php echo $stt_nttm; ?></td>
                        <td><?php echo $cart_item['id_sanpham']; ?></td>
                        <td><?php echo $cart_item['ma_sanpham']; ?></td>
                        <td><img src="../back-end/uploads/<?php echo $cart_item['anh_sanpham']; ?>" style="width: 130px;"></td>
                        <td><?php echo $cart_item['ten_sanpham']; ?></td>
                        <td>
                            <a href="themgiohang-NguyenThiTraMi.php?cong=<?php echo $cart_item['id_sanpham']; ?>" style="font-size: 28px; padding: 0 6px; font-weight:bold;">+</a>
                            <?php echo $cart_item['soluong_sanpham']; ?>
                            <a href="themgiohang-NguyenThiTraMi.php?tru=<?php echo $cart_item['id_sanpham']; ?>" style="font-size: 36px; padding: 0 6px; font-weight:bold;">-</a>
                        </td>
                        <td><?php echo number_format($cart_item['gia_sanpham']).'vnd'; ?></td>
                        <td><?php echo number_format($thanhtien).'vnd'; ?></td>
                        <td><a href="themgiohang-NguyenThiTraMi.php?xoa=<?php echo $cart_item['id_sanpham']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                    </tr>
                    <?php
                            }
                    ?>
                    <tr>
                        <td colspan="9">
                            <p style="float: left; color:red; font-weight:bold; margin-top: 10px">TỔNG TIỀN HÀNG: <?php echo number_format($tongtien).'vnd'; ?></p>
                            <p style="float: right; font-weight:bold; margin-top: 10px"><a href="themgiohang-NguyenThiTraMi.php?xoatatca=1">
                            XÓA TẤT CẢ</a></p>
                        </td>
                    </tr>
                    <?php
                        }else{
                    ?>
                    <tr>
                        <td colspan="9"><p>Hiện tại giỏ hàng trống</p></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                <div class="cart_content_right_button">
                        <a href="./thanhtoan-NguyenThiTraMi.php"><button>THANH TOÁN</button></a>
                </div>
                <div class="cart_content_right_dangnhap">
                        <p>TÀI KHOẢN FAHASA</p>
                        <p>Hãy <a href="dangky-NguyenThiTraMi.php">Đăng ký</a> tài khoản để tích điểm thành viên</p>
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- End: content-->
<?php
    include("footer-NguyenThiTraMi.php");
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