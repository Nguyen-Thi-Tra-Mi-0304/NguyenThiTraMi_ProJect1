<?php
    include("./config/connect-NguyenThiTraMi.php");
    $sql_dm_nttm = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC";
    $res_dm_nttm = $conn_nttm->query($sql_dm_nttm);
?>

<div class="cartegory_left">
    <ul>
        <?php
            while($row_dm_nttm = $res_dm_nttm->fetch_array()):
        ?>
        <li class="cartegory_left_li">
            <a href="main-NguyenThiTraMi.php?id=<?php echo $row_dm_nttm["id_danhmuc"]; ?>">
            <?php echo $row_dm_nttm["ten_danhmuc"]; ?></a>
        </li>
        <?php
            endwhile;
        ?>
    </ul>
</div>