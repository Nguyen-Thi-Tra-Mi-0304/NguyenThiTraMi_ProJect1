<?php
    include("./config/connect-NguyenThiTraMi.php");

    $res_xuly_sp = null;  // Khởi tạo biến $res_sp_nttm trước khi sử dụng

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql_xuly_sp = "SELECT * FROM tbl_sanphham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc
        AND tbl_sanpham.id_danhmuc = '$id' ORDER BY id_sanpham ASC";
        $res_xuly_sp = $conn_nttm->query($sql_xuly_sp);
        print_r($res_xuly_sp);

        if (!$res_xuly_sp) {
            // Truy vấn thất bại, xử lý lỗi 
            die("Truy vấn thất bại: " . $conn_nttm->error);
        }
    }
?>
<div class="cartegory_right_content_product">
    <div class="cartegory_right_content_product_item">
    <!-- <?php
        if (isset($res_sp_nttm) && $res_sp_nttm->num_rows > 0) {
            while($row_xuly_sp = $res_xuly_sp->fetch_array()):
    ?> -->
        <!-- <img src="../back-end/uploads/<?php echo $row_xuly_sp["anh_sanpham"]; ?>"> -->
        <div class="cartegory_right_content_product_item_text">
            <p>a</p>
            <p>1</p>
        </div>
    <!-- <?php
        endwhile;
    }
    ?>  -->
    </div>
</div>