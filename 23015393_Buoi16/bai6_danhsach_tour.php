<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Tour</title>
</head>
<body>
    <h1>Danh sách Tour Du lịch</h1>

<?php
// Mảng hai chiều lưu danh sách tour
$tours = [
    ['ma' => 'T001', 'ten' => 'Tour Hà Nội - Hạ Long', 'diem_den' => 'Hạ Long', 'gia' => 2500000, 'so_ngay' => 3],
    ['ma' => 'T002', 'ten' => 'Tour Đà Nẵng - Hội An', 'diem_den' => 'Đà Nẵng', 'gia' => 3500000, 'so_ngay' => 4],
    ['ma' => 'T003', 'ten' => 'Tour Nha Trang - Đảo', 'diem_den' => 'Nha Trang', 'gia' => 4000000, 'so_ngay' => 5],
    ['ma' => 'T004', 'ten' => 'Tour Phú Quốc', 'diem_den' => 'Phú Quốc', 'gia' => 5500000, 'so_ngay' => 6]
];

// Hiển thị danh sách tour
echo "<h2>Danh sách các tour hiện có:</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>Mã Tour</th>
        <th>Tên Tour</th>
        <th>Điểm đến</th>
        <th>Giá (VNĐ)</th>
        <th>Số ngày</th>
      </tr>";

foreach ($tours as $tour) {
    echo "<tr>";
    echo "<td>" . $tour['ma'] . "</td>";
    echo "<td>" . $tour['ten'] . "</td>";
    echo "<td>" . $tour['diem_den'] . "</td>";
    echo "<td>" . number_format($tour['gia'], 0, ',', '.') . "</td>";
    echo "<td>" . $tour['so_ngay'] . " ngày</td>";
    echo "</tr>";
}

echo "</table>";

// Xử lý form khi submit
$errors = [];
$ho_ten = '';
$ma_tour = '';
$so_nguoi = '';
$tong_tien = 0;
$tour_chon = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ho_ten = trim($_POST['ho_ten'] ?? '');
    $ma_tour = trim($_POST['ma_tour'] ?? '');
    $so_nguoi = trim($_POST['so_nguoi'] ?? '');
    
    // Kiểm tra họ tên không rỗng
    if (empty($ho_ten)) {
        $errors[] = "Họ tên không được để trống";
    }
    
    // Kiểm tra mã tour hợp lệ
    $tour_hop_le = false;
    foreach ($tours as $tour) {
        if ($tour['ma'] == $ma_tour) {
            $tour_hop_le = true;
            $tour_chon = $tour;
            break;
        }
    }
    
    if (empty($ma_tour)) {
        $errors[] = "Vui lòng chọn mã tour";
    } elseif (!$tour_hop_le) {
        $errors[] = "Mã tour không hợp lệ";
    }
    
    // Kiểm tra số người > 0
    if (empty($so_nguoi)) {
        $errors[] = "Số người không được để trống";
    } elseif (!is_numeric($so_nguoi) || $so_nguoi <= 0) {
        $errors[] = "Số người phải là số nguyên dương";
    }
    
    // Nếu không có lỗi, tính tổng tiền
    if (empty($errors) && $tour_chon) {
        $tong_tien = $tour_chon['gia'] * $so_nguoi;
    }
}
?>

    <hr>
    <h2>Form Đặt Tour</h2>
    
    <form method="POST" action="">
        <p>
            <label>Họ tên: </label>
            <input type="text" name="ho_ten" value="<?php echo htmlspecialchars($ho_ten); ?>" size="40">
        </p>
        
        <p>
            <label>Chọn mã tour: </label>
            <select name="ma_tour">
                <option value="">-- Chọn tour --</option>
                <?php foreach ($tours as $tour): ?>
                    <option value="<?php echo $tour['ma']; ?>" 
                        <?php echo ($ma_tour == $tour['ma']) ? 'selected' : ''; ?>>
                        <?php echo $tour['ma'] . " - " . $tour['ten']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        
        <p>
            <label>Số người: </label>
            <input type="number" name="so_nguoi" value="<?php echo htmlspecialchars($so_nguoi); ?>" min="1">
        </p>
        
        <p>
            <input type="submit" value="Đặt Tour">
        </p>
    </form>

<?php
// Hiển thị kết quả
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($errors)) {
        echo "<h3 style='color: red;'>Lỗi:</h3>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li style='color: red;'>" . $error . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<h3 style='color: green;'>Đặt tour thành công!</h3>";
        echo "<p><strong>Họ tên:</strong> " . htmlspecialchars($ho_ten) . "</p>";
        echo "<p><strong>Tour đã chọn:</strong> " . $tour_chon['ten'] . "</p>";
        echo "<p><strong>Điểm đến:</strong> " . $tour_chon['diem_den'] . "</p>";
        echo "<p><strong>Số ngày:</strong> " . $tour_chon['so_ngay'] . " ngày</p>";
        echo "<p><strong>Giá tour:</strong> " . number_format($tour_chon['gia'], 0, ',', '.') . " VNĐ</p>";
        echo "<p><strong>Số người:</strong> " . $so_nguoi . "</p>";
        echo "<p><strong>Tổng tiền:</strong> " . number_format($tong_tien, 0, ',', '.') . " VNĐ</p>";
    }
}
?>

</body>
</html>
