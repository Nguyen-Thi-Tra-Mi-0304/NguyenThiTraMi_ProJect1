<?php
    session_start();
    include("./config/connect-NguyenThiTraMi.php");
    // thêm sản phẩm vào giỏ hàng 
    if(isset($_POST['themgiohang'])) {
        $id_sp = $_GET['id_sp'];
        $soluong_sanpham = 1; 

        $sql_sp_nttm = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id_sp' LIMIT 1";
        $res_sp_nttm = $conn_nttm->query($sql_sp_nttm);
        $row_sp_nttm = mysqli_fetch_array($res_sp_nttm);
        if($row_sp_nttm){
            $new_product = array
            (array('ten_sanpham'=>$row_sp_nttm['ten_sanpham'],
            'id_sanpham'=>$id_sp,
            'soluong_sanpham'=>$soluong_sanpham,
            'gia_sanpham'=>$row_sp_nttm['gia_sanpham'],
            'anh_sanpham'=>$row_sp_nttm['anh_sanpham'],
            'ma_sanpham'=>$row_sp_nttm['ma_sanpham'])
            );
            // kiểm tra session giỏ hàng đã tồn tại
            if(isset($_SESSION['cart'])) {
                $found = false; 
                foreach($_SESSION['cart'] as $cart_item){
                    if($cart_item['id_sanpham']==$id_sp){
                        // nếu dữ liệu trùng 
                        $product[] = array('ten_sanpham'=>$cart_item['ten_sanpham'],
                            'id_sanpham'=>$cart_item['id_sanpham'],
                            'soluong_sanpham'=>$soluong_sanpham+1,
                            'gia_sanpham'=>$cart_item['gia_sanpham'],
                            'anh_sanpham'=>$cart_item['anh_sanpham'],
                            'ma_sanpham'=>$cart_item['ma_sanpham']);
                        $found = true; 
                    }else{
                        // nếu dữ liệu không trùng
                        $product[] = array('ten_sanpham'=>$cart_item['ten_sanpham'],
                            'id_sanpham'=>$cart_item['id_sanpham'],
                            'soluong_sanpham'=>$cart_item['soluong_sanpham'],
                            'gia_sanpham'=>$cart_item['gia_sanpham'],
                            'anh_sanpham'=>$cart_item['anh_sanpham'],
                            'ma_sanpham'=>$cart_item['ma_sanpham']);
                    }
                }
                if($found == false){
                    // liên kết dữ liệu new_product với product
                    $_SESSION['cart']=array_merge($product,$new_product);
                }else{
                    $_SESSION['cart']=$product;   
                }
            }else{
                $_SESSION['cart'] = $new_product; 
            }
        }
        header("Location: cart-NguyenThiTraMi.php?quanly=giohang");
    }
    // xóa tất cả sản phẩm
    if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
        unset($_SESSION['cart']);
        header("Location: cart-NguyenThiTraMi.php?quanly=giohang");
    }
    // xóa sản phẩm
    if(isset($_SESSION['cart'])&&isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            
            if($cart_item['id_sanpham']!=$id){
                $product[] = array('ten_sanpham'=>$cart_item['ten_sanpham'],
                'id_sanpham'=>$cart_item['id_sanpham'],
                'soluong_sanpham'=>$cart_item['soluong_sanpham'],
                'gia_sanpham'=>$cart_item['gia_sanpham'],
                'anh_sanpham'=>$cart_item['anh_sanpham'],
                'ma_sanpham'=>$cart_item['ma_sanpham']);
            }
        $_SESSION['cart'] = $product;
        header("Location: cart-NguyenThiTraMi.php?quanly=giohang");
        }
    }
    // thêm số lượng 
    if(isset($_GET['cong'])){
        $id = $_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id_sanpham']!=$id){
                $product[] = array('ten_sanpham'=>$cart_item['ten_sanpham'],
                    'id_sanpham'=>$cart_item['id_sanpham'],
                    'soluong_sanpham'=>$cart_item['soluong_sanpham'],
                    'gia_sanpham'=>$cart_item['gia_sanpham'],
                    'anh_sanpham'=>$cart_item['anh_sanpham'],
                    'ma_sanpham'=>$cart_item['ma_sanpham']);
            $_SESSION['cart'] = $product;
            }else{
                $tangsoluong = $cart_item['soluong_sanpham'] + 1;
                if($cart_item['soluong_sanpham']<10) {
                    $product[] = array('ten_sanpham'=>$cart_item['ten_sanpham'],
                    'id_sanpham'=>$cart_item['id_sanpham'],
                    'soluong_sanpham'=>$tangsoluong,
                    'gia_sanpham'=>$cart_item['gia_sanpham'],
                    'anh_sanpham'=>$cart_item['anh_sanpham'],
                    'ma_sanpham'=>$cart_item['ma_sanpham']);
                }else{
                    $product[] = array('ten_sanpham'=>$cart_item['ten_sanpham'],
                    'id_sanpham'=>$cart_item['id_sanpham'],
                    'soluong_sanpham'=>$cart_item['soluong_sanpham'],
                    'gia_sanpham'=>$cart_item['gia_sanpham'],
                    'anh_sanpham'=>$cart_item['anh_sanpham'],
                    'ma_sanpham'=>$cart_item['ma_sanpham']);
                }
                $_SESSION['cart'] = $product;
            } 
        } 
        header("Location: cart-NguyenThiTraMi.php?quanly=giohang");
    }
    // trừ số lượng 
    if(isset($_GET['tru'])){
        $id = $_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id_sanpham']!=$id){
                $product[] = array('ten_sanpham'=>$cart_item['ten_sanpham'],
                    'id_sanpham'=>$cart_item['id_sanpham'],
                    'soluong_sanpham'=>$cart_item['soluong_sanpham'],
                    'gia_sanpham'=>$cart_item['gia_sanpham'],
                    'anh_sanpham'=>$cart_item['anh_sanpham'],
                    'ma_sanpham'=>$cart_item['ma_sanpham']);
            $_SESSION['cart'] = $product;
            }else{
                $tangsoluong = $cart_item['soluong_sanpham'] - 1;
                if($cart_item['soluong_sanpham']>1) {
                    $product[] = array('ten_sanpham'=>$cart_item['ten_sanpham'],
                    'id_sanpham'=>$cart_item['id_sanpham'],
                    'soluong_sanpham'=>$tangsoluong,
                    'gia_sanpham'=>$cart_item['gia_sanpham'],
                    'anh_sanpham'=>$cart_item['anh_sanpham'],
                    'ma_sanpham'=>$cart_item['ma_sanpham']);
                }else{
                    $product[] = array('ten_sanpham'=>$cart_item['ten_sanpham'],
                    'id_sanpham'=>$cart_item['id_sanpham'],
                    'soluong_sanpham'=>$cart_item['soluong_sanpham'],
                    'gia_sanpham'=>$cart_item['gia_sanpham'],
                    'anh_sanpham'=>$cart_item['anh_sanpham'],
                    'ma_sanpham'=>$cart_item['ma_sanpham']);
                }
                $_SESSION['cart'] = $product;
            } 
        } 
        header("Location: cart-NguyenThiTraMi.php?quanly=giohang");
    }
?>
