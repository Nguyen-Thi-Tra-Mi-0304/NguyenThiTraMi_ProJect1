<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm chi tiết</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/main_NguyenThiTraMi.css">
</head>
<body>
<?php
    include("header-NguyenThiTraMi.php");
?>

<?php
    include("./config/connect-NguyenThiTraMi.php");
    
    if(isset($_GET["sp_id"])) {
        $sp_id = $_GET["sp_id"];
        $sql_pro_nttm = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
        AND tbl_sanpham.id_sanpham = '$sp_id' LIMIT 1";
        $res_pro_nttm = $conn_nttm->query($sql_pro_nttm);
        // print_r($res_pro_nttm);
    }
    
?>
<section id="product">
    <div class="container">
        <div class="product_content row">
            <div class="product_content_left">
                <?php
                    while($row_pro_nttm = mysqli_fetch_array($res_pro_nttm)):
                ?>
                <div class="product_content_left_big_img">
                    <img src="../back-end/uploads/<?php echo $row_pro_nttm["anh_sanpham"]; ?>">
                </div>
                <?php
                    endwhile;
                ?>
            </div>
            <?php
                include("./product-chitietsp-NguyenThiTraMi.php");
            ?>
            </div>
        </div>

</section>
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