<?php
    include("./config/connect-NguyenThiTraMi.php");
    
    if(isset($_GET["sp_id"])) {
        $sp_id = $_GET["sp_id"];
        $sql_pro_nttm = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
        AND tbl_sanpham.id_sanpham = '$sp_id' LIMIT 1";
        $res_pro_nttm = $conn_nttm->query($sql_pro_nttm);
    }
?>

<div class="product_content_right">
    <div class="product_content_right_new">
        <?php
            while($row_pro_nttm = $res_pro_nttm->fetch_array()):
        ?>
        <h1><?php echo $row_pro_nttm["ten_sanpham"]; ?></h1>
        <h5><?php echo number_format($row_pro_nttm["gia_sanpham"]).'vnd'; ?></h5>
        <p>Mã sản phẩm: <?php echo $row_pro_nttm["ma_sanpham"]; ?></p>
        <p>Tên danh mục: <?php echo $row_pro_nttm["ten_danhmuc"]; ?></p>
        <form action="themgiohang-NguyenThiTraMi.php?id_sp=<?php echo $row_pro_nttm["id_sanpham"] ?>" method="post">
            <input required type="submit" class="themgiohang" name="themgiohang" value="Thêm vào giỏ hàng">
        </form>
        <div class="product_content_right_bottom">
            <div class="product_content_right_botto-title">
                <h1>Thông tin sản phẩm</h1>
            </div>
            <div class="product_content_right_bottom_text">
                <p><?php echo $row_pro_nttm["noidung_sanpham"]; ?></p>
            </div>
        </div>
        <?php
            endwhile;
        ?>
    </div>
</div>