<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="style-sanpham.css">
</head>
<body>
    <?php
        include("../connect-NguyenThiTraMi.php");

        // $sql_list_nttm = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY id_sanpham  DESC";
        $sql_list_nttm = "SELECT tbl_sanpham.*, tbl_danhmuc.ten_danhmuc FROM tbl_sanpham INNER JOIN tbl_danhmuc 
        ON tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC";
        $resul_list_nttm = $conn_nttm->query($sql_list_nttm);

    ?>
    <div class="admin-content">
        <div class="admin-content-top">
            <a href="../quanlysanpham-NguyenThiTraMi.php" class="btn">Trở về</a>
            <h2>Quản lý sản phẩm</h2>
            <!-- <form action="timkiemsanpham" method="get">
            <div class="search-contain">
                <label for="keyword">Tìm kiếm theo tên: </label>
                <input type="search" name="keyword" value=""placeholder="Nhập tên sách cần tìm..." style="width:450px"/>
                <input type="submit" name="btnSearch" value="Tìm kiếm" class="btnsearch" />
            </div>
        </form> -->
        </div>
        <div class="admin-content-bottom">
            <h2>Danh sách sản phẩm</h2>
            <table style="width: 100%; text-align:center;" border="1px">
                <tr>
                    <th>STT</th>
                    <th>ID Sản Phẩm</th>
                    <th>Mã Sản phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Mô tả sản phẩm</th>
                    <th>Hình ảnh sản phẩm</th>
                    <th>Danh mục sản phẩm</th>
                    <th>Tình trạng</th>
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
                    <td><?php echo $row_list_nttm['id_sanpham'] ?></td>
                    <td><?php echo $row_list_nttm['ma_sanpham'] ?></td>
                    <td><?php echo $row_list_nttm['ten_sanpham'] ?></td>
                    <td><?php echo $row_list_nttm['gia_sanpham'] ?></td>
                    <td><?php echo $row_list_nttm['noidung_sanpham'] ?></td>
                    <td><img src="../uploads/<?php echo $row_list_nttm['anh_sanpham'] ?>" width="150px"></td>
                    <td><?php echo $row_list_nttm['ten_danhmuc'] ?></td>
                    <td><?php echo $row_list_nttm["tinhtrang_sanpham"]==1?"Hoạt động":"Ngừng hoạt động"; ?></td>
                    <td>
                        <a href="sanpham-edit-NguyenThiTraMi.php?id_sp=<?php echo $row_list_nttm['id_sanpham'] ?>"
                        class="btnSua">Sửa</a>
                        |
                        <a href="sanpham-delete-NguyenThiTraMi.php?id_sp=<?php echo $row_list_nttm['id_sanpham'] ?>"
                        onclick="if(confirm('Bạn có muốn xóa không')){return true;}else{return false;}" class="btnXoa"
                        >Xóa</a>
                    </td>
                </tr>
                <?php
                        endwhile;
                    }else{
                ?>
                 <tr>
                        <td colspan="9">Chưa có dữ liệu</td>
                    </tr>
                <?php
                    };
                ?>
            </table>
        </div>
    </div>
</body>
</html>