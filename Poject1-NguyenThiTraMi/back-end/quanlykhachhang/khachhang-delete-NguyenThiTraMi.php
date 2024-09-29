<?php
include("../connect-NguyenThiTraMi.php");

if(isset($_GET["id_dk"])){
    // thực hiện xóa sản phẩm theo madm_nttm
    $id_khachhang = $_GET["id_dk"];
    // tạo truy vấn xóa 
    $sql_delete_nttm = "DELETE FROM tbl_dangky WHERE id_khachhang = '$id_khachhang'";
    // Thực thi truy vấn
    if($conn_nttm->query($sql_delete_nttm)) {
        header("Location: ../quanlykhachhang-NguyenThiTraMi.php");
    }else{
        echo "<script>alert('Lỗi xóa'); </script>";
    }
}
?>