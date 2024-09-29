<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="style-sanpham.css">
</head>
<body>
    <?php
        include("../connect-NguyenThiTraMi.php");

        if(isset($_GET['id_sp'])) {
            $id_sp = $_GET["id_sp"];
            $sql_edit_nttm = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id_sp' ";
            $res_edit_nttm = $conn_nttm->query($sql_edit_nttm);
            $row_edit_nttm = $res_edit_nttm->fetch_array();
        }else{
            header("Location: ./sanpham-list-NguyenThiTraMi.php");
        } 
        if(isset($_POST["Suasanpham"])) {
            $ma_sanpham = $_POST["ma_sanpham"];
            $ten_sanpham = $_POST["ten_sanpham"];
            $gia_sanpham = $_POST["gia_sanpham"];
            $noidung_sanpham = $_POST["noidung_sanpham"];
            $anh_sanpham = $_FILES["anh_sanpham"]["name"];
            $anh_sanpham_tmp = $_FILES["anh_sanpham"]["tmp_name"];
            $id_danhmuc = $_POST["id_danhmuc"];
            $tinhtrang_sanpham = $_POST["tinhtrang_sanpham"];

            if($_POST["anh_sanpham"]) {
                move_uploaded_file($anh_sanpham_tmp,'./uploads/'.$anh_sanpham);
                $sql_update_nttm = "UPDATE tbl_sanpham SET ";
                $sql_update_nttm .="ma_sanpham = '$ma_sanpham', ";
                $sql_update_nttm .="ten_sanpham = '$ten_sanpham', ";
                $sql_update_nttm .="gia_sanpham = '$gia_sanpham', ";
                $sql_update_nttm .="noidung_sanpham = '$noidung_sanpham', ";
                $sql_update_nttm .="anh_sanpham = '$anh_sanpham', ";
                $sql_update_nttm .="id_danhmuc = '$id_danhmuc', ";
                $sql_update_nttm .="tinhtrang_sanpham = '$tinhtrang_sanpham' ";
                $sql_update_nttm .="WHERE id_sanpham = '$id_sp' ";
            }else{
                $sql_update_nttm = "UPDATE tbl_sanpham SET ";
                $sql_update_nttm .="ma_sanpham = '$ma_sanpham', ";
                $sql_update_nttm .="ten_sanpham = '$ten_sanpham', ";
                $sql_update_nttm .="gia_sanpham = '$gia_sanpham', ";
                $sql_update_nttm .="noidung_sanpham = '$noidung_sanpham', ";
                $sql_update_nttm .="id_danhmuc = '$id_danhmuc', ";
                $sql_update_nttm .="tinhtrang_sanpham = '$tinhtrang_sanpham' ";
                $sql_update_nttm .="WHERE id_sanpham = '$id_sp' ";
            }
            
            if($conn_nttm->query($sql_update_nttm)) {
                header("Location: ./sanpham-list-NguyenThiTraMi.php");
            }else{
                $error_message_nttm = "Lỗi sửa dữ liệu!".mysqli_errno($conn_nttm);
            }
        }
    ?>
    <div class="admin-content">
        <div class="admin-content-top">
            <a href="./sanpham-list-NguyenThiTraMi.php" class="btn" style="width: 200px;">Danh sách sản phẩm</a>
            <h2>Quản lý sản phẩm</h2>
        </div>
        <div class="admin-content-bottom-sua">
            <h2>Thêm sản phẩm</h2>
            <form action="" method="post" enctype="multipart/form-data">
                    <table style="width: 70%;">
                        <tr>
                            <td><label for="ma_sanpham">Mã sản phẩm: </label></td>
                            <td><input required type="text" name="ma_sanpham" id="ma_sanpham"
                            value="<?php echo $row_edit_nttm["ma_sanpham"]; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="ten_sanpham">Tên sản phẩm: </label></td>
                            <td><input required type="text" name="ten_sanpham" id="ten_sanpham"
                            value="<?php echo $row_edit_nttm["ten_sanpham"]; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="gia_sanpham">Giá sản phẩm: </label></td>
                            <td><input required type="text" name="gia_sanpham" id="gia_sanpham"
                            value="<?php echo $row_edit_nttm["gia_sanpham"]; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="noidung_sanpham">Mô tả sản phẩm: </label></td>
                            <td><textarea name="noidung_sanpham" id="noidung_sanpham" cols="52" rows="10" style="resize: none;">
                            <?php echo $row_edit_nttm["noidung_sanpham"]; ?></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="anh_sanpham">Ảnh sản phẩm: </label></td>
                            <td>
                                <input type="file" name="anh_sanpham"> <br>
                                <img src="../uploads/<?php echo $row_edit_nttm['anh_sanpham'] ?>" width="150px">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="id_danhmuc">Danh mục sản phẩm: </label></td>
                            <td>
                                <select name="id_danhmuc" style="height: 30px;">
                                    <option value="#">--Chọn danh mục--</option>
                                    <?php
                                        $sql_dm_nttm = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                                        $res_dm_nttm = $conn_nttm->query($sql_dm_nttm);
                                        while($row_dm_nttm = $res_dm_nttm->fetch_array()):
                                    ?>
                                    <option value="<?php echo $row_dm_nttm["id_danhmuc"]; ?>"
                                    <?php
                                        if($row_dm_nttm["id_danhmuc"]==$row_edit_nttm["id_danhmuc"]){
                                            echo "selected";
                                        }
                                    ?>
                                    >
                                        <?php echo $row_dm_nttm["ten_danhmuc"]; ?> 
                                    </option>
                                    <?php
                                        endwhile;
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="tinhtrang_sanpham">Tình trạng: </label></td>
                            <td>
                                <select name="tinhtrang_sanpham" style="height: 30px;">
                                    <?php
                                        if($row_edit_nttm['tinhtrang_sanpham']==1) {
                                    ?>
                                        <option value="1" selected>Hoạt động</option>
                                        <option value="0">Ngừng hoạt động</option>
                                    <?php
                                        }else{
                                    ?>
                                        <option value="1">Hoạt động</option>
                                        <option value="0" selected>Ngừng hoạt động</option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class="btn" name="Suasanpham" style="width: 100px; height:40px" value="Sửa"></td>
                        </tr>
                    </table>
                </form>
        </div>
    </div>
</body>
</html>