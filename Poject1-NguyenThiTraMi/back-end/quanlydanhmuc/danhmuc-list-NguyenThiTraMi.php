<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách danh mục</title>
    <link rel="stylesheet" href="style-danhmuc.css">
</head>
<body>
    <?php
        include("../connect-NguyenThiTraMi.php");

        $sql_list_nttm = "SELECT * FROM tbl_danhmuc ORDER BY thutu_danhmuc DESC";
        $resul_list_nttm = $conn_nttm->query($sql_list_nttm);
    ?>
    <div class="admin-content">
        <div class="admin-content-top">
            <a href="../quanlydanhmuc-NguyenThiTraMi.php" class="btn">Trở về</a>
            <h2>Quản lý danh mục</h2>
        </div>
        <div class="admin-content-bottom">
            <h2>Danh sách danh mục</h2>
            <table style="width: 100%; text-align:center;" border="1px">
                <tr>
                    <th>STT</th>
                    <th>ID Danh Mục</th>
                    <th>Tên Danh Mục</th>
                    <th>Chức năng</th>
                </tr>
                <?php
                    if($resul_list_nttm->num_rows>0){
                        $stt_nttm = 0; 
                        while($row_list_nttm = $resul_list_nttm->fetch_array()):
                            $stt_nttm++;
                ?>
                <tr>
                    <td><?php echo $stt_nttm; ?></td>
                    <td><?php echo $row_list_nttm['id_danhmuc'] ?></td>
                    <td><?php echo $row_list_nttm['ten_danhmuc'] ?></td>
                    <td>
                        <a href="danhmuc-edit-NguyenThiTraMi.php?id_dm=<?php echo $row_list_nttm['id_danhmuc'] ?>"
                        class="btnSua">Sửa</a>
                        |
                        <a href="danhmuc-delete-NguyenThiTraMi.php?id_dm=<?php echo $row_list_nttm['id_danhmuc'] ?>"
                        onclick="if(confirm('Bạn có muốn xóa không')){return true;}else{return false;}" class="btnXoa"
                        >Xóa</a>
                    </td>
                </tr>
                <?php
                        endwhile;
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>