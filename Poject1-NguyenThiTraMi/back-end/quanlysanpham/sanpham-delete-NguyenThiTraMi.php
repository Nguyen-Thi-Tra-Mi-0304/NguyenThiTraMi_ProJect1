<?php
include("../connect-NguyenThiTraMi.php");

if(isset($_GET["id_sp"])){
    // thực hiện xóa sản phẩm theo madm_nttm
    $id_sp = $_GET["id_sp"];
    // tạo truy vấn xóa 
    $sql_delete_nttm = "DELETE FROM tbl_sanpham WHERE id_sanpham = '$id_sp'";
    // Thực thi truy vấn
    if($conn_nttm->query($sql_delete_nttm)) {
        header("Location: sanpham-list-NguyenThiTraMi.php");
    }else{
        echo "<script>alert('Lỗi xóa'); </script>";
    }
}
?>