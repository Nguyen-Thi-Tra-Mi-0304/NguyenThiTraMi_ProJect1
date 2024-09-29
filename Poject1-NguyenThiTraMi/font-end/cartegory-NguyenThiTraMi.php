<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/main_NguyenThiTraMi.css">
    
</head>
<body>
    <?php
        include("header-NguyenThiTraMi.php");
        include("nav-NguyenThiTraMi.php");
    ?>
    <div id="cartegory">
        <div class="container">
                <div class="cartegory_item" style="width:100%;">
                    <div class="cartegory_right_content row">
                        <?php
                            include("./cartegory-xuly-NguyenThiTraMi.php");
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
        include("footer-NguyenThiTraMi.php");
    ?>
<script>
    //Tạo đóng mở Tài khoản (Đăng nhập)---------------------------------------------------------------------------------
    const connectopen = document.querySelector('#connect_form_open')
    const connectclose = document.querySelector('#connect_form_close')
    
    // console.log(connectbtn)
    connectopen.addEventListener("click", function(){
    document.querySelector('.connect_form').style.display = "flex"
    })
    connectclose.addEventListener("click", function(){
    document.querySelector('.connect_form').style.display = "none"
    })
</script>
</body>
</html>