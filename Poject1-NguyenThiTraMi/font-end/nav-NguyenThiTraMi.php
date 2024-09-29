<?php
    include("./config/connect-NguyenThiTraMi.php");
    $sql_dm_nttm = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $res_dm_nttm = $conn_nttm->query($sql_dm_nttm);
?>

<nav>
        <div class="menu-bar">
            <div class="container">
                <div class="menu-bar-content">
                    <ul>
                        <?php
                            while($row_dm_nttm = $res_dm_nttm->fetch_array()):
                        ?>
                        <li><a href="cartegory-NguyenThiTraMi.php?quanly=danhmucsanpham?id=<?php echo $row_dm_nttm["id_danhmuc"]; ?>">
                            <?php echo $row_dm_nttm["ten_danhmuc"]; ?></a></li>
                        <?php
                            endwhile;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>