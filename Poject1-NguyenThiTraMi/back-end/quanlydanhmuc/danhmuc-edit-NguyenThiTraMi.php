<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa danh mục</title>
    <link rel="stylesheet" href="style-danhmuc.css">
</head>
<body>
    <?php
        include("../connect-NguyenThiTraMi.php");

        if(isset($_GET['id_dm'])) {
            $id_dm = $_GET["id_dm"];
            $sql_edit_nttm = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = '$id_dm' ";
            $res_edit_nttm = $conn_nttm->query($sql_edit_nttm);
            $row_edit_nttm = $res_edit_nttm->fetch_array();
        }else{
            header("Location: ./danhmuc-list-NguyenThiTraMi.php");
        } 
        
        if(isset($_POST['Suadanhmuc'])) {
            $ten_danhmuc = $_POST["ten_danhmuc"];
            $thutu_danhmuc = $_POST["thutu_danhmuc"];
    
            $sql_update_nttm = "UPDATE tbl_danhmuc SET ";
            $sql_update_nttm .="ten_danhmuc = '$ten_danhmuc', ";
            $sql_update_nttm .="thutu_danhmuc = '$thutu_danhmuc' ";
            $sql_update_nttm .="WHERE id_danhmuc = '$id_dm' ";
            if($conn_nttm->query($sql_update_nttm)) {
                header("Location: ./danhmuc-list-NguyenThiTraMi.php");
            }else{
                $error_message_nttm = "Lỗi sửa dữ liệu!".mysqli_errno($conn_nttm);
            }
        }   
    ?>  
    <div class="admin-content">
        <div class="admin-content-top">
            <a href="./danhmuc-list-NguyenThiTraMi.php" class="btn" style="width: 200px;">Danh sách danh mục</a>
            <h2>Quản lý danh mục</h2>
        </div>
        <div class="admin-content-bottom-sua">
            <h2>Sửa danh mục</h2>
            <form action="" method="post">
                <div>
                    <label for="ten_danhmuc">Tên danh mục: </label>
                    <input required type="text" name="ten_danhmuc" id="ten_danhmuc"
                    value="<?php echo $row_edit_nttm["ten_danhmuc"]; ?>">
                </div>
                <div>
                    <label for="thutu_danhmuc">Thứ tự danh mục: </label>
                    <input required type="text" name="thutu_danhmuc" id="thutu_danhmuc"
                    value="<?php echo $row_edit_nttm["thutu_danhmuc"]; ?>"> 
                </div>
                <input type="submit" class="btn" name="Suadanhmuc" style="width: 90px; height: 40px; margin-left:30px" value="Sửa">
            </form>
        </div>
    </div>
</body>
</html>