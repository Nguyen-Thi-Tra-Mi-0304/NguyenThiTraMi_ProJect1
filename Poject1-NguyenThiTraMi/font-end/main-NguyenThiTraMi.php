<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fahasa</title>
    <link rel="stylesheet" href="./css/main_NguyenThiTraMi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
    include("header-NguyenThiTraMi.php");
    include("slider-NguyenThiTraMi.php");  
?>  
<div id="cartegory">
<div class="container">
    <div class="row">
    <?php
        include("./danhmuc-cartegory-NguyenThiTraMi.php");
        include("./sanpham-cartegory-NguyenThiTraMi.php");
    ?>
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

    // slider--------------------------------------------------------------------------------------------------
    const rightbtn = document.querySelector(".fa-chevron-right")
    const leftbtn = document.querySelector(".fa-chevron-left")
    // console.log(rightbtn)
    let Index = 0
    const imgNumber = document.querySelectorAll('.slider_content_left_banner img')
    console.log(imgNumber.length)

    rightbtn.addEventListener("click", function(){
        // console.log("ok")
        Index = Index + 1
        if(Index > imgNumber.length-1){
            Index = 0
        }
        document.querySelector('.slider_content_left_banner').style.right = Index * 100 +"%"
    })
    leftbtn.addEventListener("click", function(){
        // console.log("ok")
        Index = Index - 1
        if(Index <= 0){
            Index = imgNumber.length-1
        }
        document.querySelector('.slider_content_left_banner').style.right = Index * 100 +"%"
    })
    // Tự động chuyển slider
    function imgAuto () {
        Index = Index + 1
        if(Index > imgNumber.length-1){
            Index = 0
        }
        document.querySelector('.slider_content_left_banner').style.right = Index * 100 +"%"
        console.log(Index)
    }
    setInterval(imgAuto,5000)  
</script>
</body>
</html>