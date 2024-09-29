<?php
    include("./config/connect-NguyenThiTraMi.php");

    $res_sp_nttm = null;  // Khởi tạo biến $res_sp_nttm trước khi sử dụng

    if (isset($_GET['id'])) {
        $sp_id = $_GET["id"];
        $sql_sp_nttm = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
        AND tbl_sanpham.id_danhmuc = '$sp_id' ORDER BY id_sanpham ASC LIMIT 24";
        $res_sp_nttm = $conn_nttm->query($sql_sp_nttm);

        if (!$res_sp_nttm) {
            // Truy vấn thất bại, xử lý lỗi 
            die("Truy vấn thất bại: " . $conn_nttm->error);
        }
    }
    
?>
<div class="cartegory_right row">
    <div class="cartegory_right_content">
        <div class="cartegory_right_content_product">
        <?php
            if (isset($res_sp_nttm) && $res_sp_nttm->num_rows > 0) {
                while ($row_sp_nttm = mysqli_fetch_array($res_sp_nttm)):
        ?>
            <div class="cartegory_right_content_product_item">
            <a href="product-NguyenThiTraMi.php?sp_id=<?php echo $row_sp_nttm["id_sanpham"]; ?>">
                <img src="../back-end/uploads/<?php echo $row_sp_nttm["anh_sanpham"]; ?>">
                <div class="cartegory_right_content_product_item_text">
                    <p><?php echo $row_sp_nttm["ten_sanpham"]; ?></p>
                    <p><?php echo number_format($row_sp_nttm["gia_sanpham"]).'vnd'; ?></p>
                </div> 
            </a>
            </div>
        <?php
                endwhile;
            }
        ?>
        </div>
    </div> 
</div>

