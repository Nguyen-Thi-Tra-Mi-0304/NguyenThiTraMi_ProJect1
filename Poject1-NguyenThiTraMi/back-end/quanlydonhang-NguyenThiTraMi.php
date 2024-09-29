<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="./css/admin-NguyenThiTraMi-2210900041.css">
</head>
<body>
    <?php
        if(isset($_GET['action'])=='dangxuat') {
            unset($_SESSION["dangnhap"]);
            header('Location: login-NguyenThiTraMi.php');
        }
    ?>
    <div class="admin-content">
        <div class="admin-content-left">
            <div class="admin-content-left-top">
                <img src="./img/fahasa-logo.png" alt="">
                <h3>Xin chào Nguyễn Thị Trà Mi</h3>
                <h3>Chúc bạn một ngày mới tốt lành &#9786;</h3>
            </div>
            <div class="admin-conent-left-bottom">
            <li class="admin-out"><a href="admin-NguyenThiTraMi.php?action=dangxuat">Đăng xuất</a></li>
                <ul class="admin-content-left-menu">
                    <li><a href="admin-NguyenThiTraMi.php">Bảng điều khiến</a></li>
                    <li><a href="quanlydanhmuc-NguyenThiTraMi.php">Quản lý danh mục</a></li>
                    <li><a href="quanlykhachhang-NguyenThiTraMi.php">Quản lý khách hàng</a></li>
                    <li><a href="quanlysanpham-NguyenThiTraMi.php">Quản lý sản phẩm</a></li>
                    <li class="active"><a href="quanlydonhang-NguyenThiTraMi.php">Quản lý đơn hàng</a></li>
                    <li><a href="quanlydonhangchitiet-NguyenThiTraMi.php">Quản lý chi tiết đơn hàng</a></li>
                </ul>
            </div>  
        </div>
        <?php
        include("./connect-NguyenThiTraMi.php");

        $sql_list_nttm = "SELECT * FROM tbl_cart ORDER BY id_cart DESC";
        $resul_list_nttm = $conn_nttm->query($sql_list_nttm);
        ?>
        <div class="admin-content-right">
            <div class="admin-content-right-top">
                <h2>Quản lý đơn hàng</h2>
            </div>
            <div class="admin-content-bottom">
            <h2 style="margin: 12px 0;">Danh sách đơn hàng</h2>
            <table style="width: 100%; text-align:center;" border="1px">
                <tr>
                    <th>STT</th>
                    <th>ID Đơn Hàng</th>
                    <th>ID Khách Hàng</th>
                    <th>Mã số đơn hàng</th>
                    <th>Tình trạng</th>
                </tr>
                <?php
                    if($resul_list_nttm->num_rows>0){
                        $stt_nttm = 0; 
                        while($row_list_nttm = $resul_list_nttm->fetch_array()):
                            $stt_nttm++;
                ?>
                <tr>
                    <td><?php echo $stt_nttm; ?></td>
                    <td><?php echo $row_list_nttm['id_cart'] ?></td>
                    <td><?php echo $row_list_nttm['id_khachhang'] ?></td>
                    <td><?php echo $row_list_nttm['code_cart'] ?></td>
                    <td><?php echo $row_list_nttm['cart_status'] ?></td>
                </tr>
                <?php
                        endwhile;
                    }
                ?>
            </table>
        </div>
        </div>
    </div>
</body>
</html>