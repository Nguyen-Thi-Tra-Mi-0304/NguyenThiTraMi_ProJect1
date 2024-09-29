<?php
    
    $sql_nttm = "SELECT * FROM tbl_sanpham WHERE 1=1";
    //Xử lý khi tìm kiếm
        if(isset($_GET["btnSearch"])){
            $keyword = $_GET["keyword"];
            if(isset($keyword)){
                $sql_nttm .=" and ten_sanpham like '%$keyword%'";
            }
        }
?>