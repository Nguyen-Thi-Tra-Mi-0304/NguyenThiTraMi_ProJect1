<?php
include("../connect-NguyenThiTraMi.php");

if(isset($_GET["id_dm"])){
    // thực hiện xóa sản phẩm theo madm_nttm
    $id_dm = $_GET["id_dm"];
    // tạo truy vấn xóa 
    $sql_delete_nttm = "DELETE FROM tbl_danhmuc WHERE id_danhmuc = '$id_dm'";
    // Thực thi truy vấn
    if($conn_nttm->query($sql_delete_nttm)) {
        header("Location: danhmuc-list-NguyenThiTraMi.php");
    }else{
        echo "<script>alert('Lỗi xóa'); </script>";
    }
}
?>