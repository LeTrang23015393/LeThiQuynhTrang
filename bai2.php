<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin tour</title>
</head>
<body>
    
    <h1>Thông tin tour du lịch</h1>
    
    <?php
        $tenTour = "Tour Đà Lạt 3 ngày 2 đêm";
        $diemDen = "Đà Lạt";
        $soNgay = 3;
        $soDem = 2;
        $giaTour = 3200000;
    ?>
    
    <h2><?php echo $tenTour; ?></h2>
    
    <p>Điểm đến: <?php echo $diemDen; ?></p>
    <p>Thời lượng: <?php echo $soNgay . " ngày " . $soDem . " đêm"; ?></p>
    <p>Giá tour: <?php echo $giaTour . " VNĐ"; ?></p>

</body>
</html>
