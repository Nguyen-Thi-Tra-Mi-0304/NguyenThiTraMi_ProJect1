<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chính sách khách sỉ</title>
    <link rel="stylesheet" href="./css/Nguyen-Thi-Tra-Mi-2210900041_hotro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
    include("../header-NguyenThiTraMi.php");
?>
<section>
    <div id="content_third">
        <div class="content_text">
            <img src="./image/hỗ trợ/KHSi-1920.jpg" alt="">
            <img src="./image/hỗ trợ/FH2-KhachSi.png" alt="">
            <p>Hiện nay, do mức chiết khấu trên Fahasa.com rất cao, đặc biệt vào các thời điểm chạy chương trình. Do đó đối với mỗi chương trình số lượng sản phẩm giảm sốc có giới hạn nhất định, vì vậy để đảm bảo quyền lợi của từng khách hàng, chúng tôi xin thông báo tiêu chí xét “Đơn Hàng Sỉ” và chính sách như sau:</p>
            <p><span>1. </span> Đơn hàng được gọi là “đơn hàng sỉ” khi đơn hàng có giá trị: từ <span>3.000.000 đồng</span> (Ba triệu đồng) trở lên.</p>
            <p><span>2. </span>Chính sách giá (% chiết khấu giảm giá). Đây là chính sách chung chỉ mang tính tương đối. Xin quý khách vui lòng liên lạc với Fahasa để có chính sách giá chính xác nhất:</p>
            <p>- Đối với Nhóm hàng sách <span>kinh tế, Văn học </span>: áp dụng mức giảm giá trên web tối đa không vượt quá 30%.</p>
            <p>- Đối với Nhóm hàng sách <span>thiếu nhi và tâm lý kỹ năng </span>: áp dụng mức giảm giá trên web tối đa không vượt quá 20%.</p>
            <p>- Đối với Nhóm hàng sách <span>từ điển và sách ngoại văn </span> : áp dụng mức giảm giá trên web tối đa không vượt quá 10%.</p>
            <p>- Đối với Nhóm hàng <span>văn phòng phẩm, đồ chơi, dụng cụ học sinh </span>: áp dụng mức giảm giá trên web tối đa không vượt quá 15%.</p>
            <p>- Đối với Nhóm hàng <span>giấy photo, sản phẩm điện tử, văn hóa phẩm </span>: áp dụng mức giảm giá trên web tối đa không vượt quá 5%.</p>
            <p>Quý khách có nhu cầu mua sỉ, vui lòng liên hệ phòng kinh doanh Fahasa.com: 1900 63 64 67 hoặc Email: sales@fahasa.com.vn.</p>
        </div>
    </div>
</section>
<?php
    include("../footer-NguyenThiTraMi.php");
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