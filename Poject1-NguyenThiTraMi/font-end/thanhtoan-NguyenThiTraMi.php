<?php
    session_start();
    include("./config/connect-NguyenThiTraMi.php");
    $id_khachhang = $_SESSION['id_khachhang'];
    $code_order = rand(0,9999);
    $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status)
    VALUES ('$id_khachhang','$code_order',1)";
    $cart_query = $conn_nttm->query($insert_cart);
    if($insert_cart){
        // Thêm giỏ hàng chi tiết 
        foreach($_SESSION['cart'] as $key => $value){
            $id_sanpham = $value['id_sanpham'];
            $soluong_sanpham = $value['soluong_sanpham'];
            
            $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluong_sanpham)
            VALUES ('$id_sanpham','$code_order','$soluong_sanpham')";
            mysqli_query($conn_nttm,$insert_order_details);
        }
    }
    unset($_SESSION['cart']);
    header('Location: camon-NguyenThiTraMi.php');
?>