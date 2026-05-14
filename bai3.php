<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Tour Du Lịch</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }
        select, input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 15px;
        }
        select:focus, input:focus {
            outline: none;
            border-color: #4CAF50;
        }
        .tour-option {
            padding: 10px;
            background-color: #f9f9f9;
            margin: 5px 0;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 25px;
            padding: 25px;
            background-color: #e8f5e9;
            border-radius: 8px;
            border-left: 5px solid #4CAF50;
        }
        .error {
            background-color: #ffebee;
            border-left: 5px solid #f44336;
            color: #c62828;
        }
        .result h3 {
            margin-top: 0;
            color: #2e7d32;
        }
        .result p {
            margin: 12px 0;
            font-size: 16px;
        }
        .highlight {
            font-size: 20px;
            font-weight: bold;
            color: #1976d2;
        }
        .price-info {
            background-color: #fff3cd;
            padding: 10px;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 14px;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🏖️ Đặt Tour Du Lịch</h2>
        
        <form method="POST">
            <div class="form-group">
                <label>Tên Tour:</label>
                <input type="text" name="tenTour" value="<?php echo isset($_POST['tenTour']) ? htmlspecialchars($_POST['tenTour']) : 'Tour Phú Quốc nghỉ dưỡng'; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Chọn Loại Tour:</label>
                <select name="loaiTour" required>
                    <option value="">-- Chọn loại tour --</option>
                    <option value="tiet_kiem" <?php echo (isset($_POST['loaiTour']) && $_POST['loaiTour'] == 'tiet_kiem') ? 'selected' : ''; ?>>
                         Tour Tiết Kiệm 2 triệu / người
                    </option>
                    <option value="tieu_chuan" <?php echo (isset($_POST['loaiTour']) && $_POST['loaiTour'] == 'tieu_chuan') ? 'selected' : ''; ?>>
                         Tour Tiêu Chuẩn 3 triệu / người
                    </option>
                    <option value="cao_cap" <?php echo (isset($_POST['loaiTour']) && $_POST['loaiTour'] == 'cao_cap') ? 'selected' : ''; ?>>
                         Tour Cao Cấp 4 triệu / người
                    </option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Số Người:</label>
                <input type="number" name="soNguoi" value="<?php echo isset($_POST['soNguoi']) ? $_POST['soNguoi'] : ''; ?>" placeholder="Nhập số người tham gia" required>
            </div>
            
            <button type="submit">Tính Tổng Tiền</button>
        </form>

        <?php
        // Kiểm tra nếu form được submit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Bước 1: Lấy dữ liệu từ form
            $tenTour = $_POST['tenTour'];
            $loaiTour = $_POST['loaiTour'];
            $soNguoi = (int)$_POST['soNguoi'];
            
            // Bước 2: Kiểm tra số người hợp lệ
            if ($soNguoi <= 0) {
                echo '<div class="result error">';
                echo '<h3>Lỗi</h3>';
                echo '<p>Số người không hợp lệ. Vui lòng nhập số người lớn hơn 0.</p>';
                echo '</div>';
            } else {
                
                // Bước 3: Xác định giá tour dựa trên loại tour khách chọn
                $giaTour = 0;
                $phanLoai = "";
                $icon = "";
                
                if ($loaiTour == 'tiet_kiem') {
                    $giaTour = 2000000;
                    $phanLoai = "Tour tiết kiệm";
                } elseif ($loaiTour == 'tieu_chuan') {
                    $giaTour = 3000000;
                    $phanLoai = "Tour tiêu chuẩn";
                } elseif ($loaiTour == 'cao_cap') {
                    $giaTour = 4000000;
                    $phanLoai = "Tour cao cấp";
                }
                
                // Công thức: Tổng tiền = Giá tour × Số người
                $tongTien = $giaTour * $soNguoi;
                
                // Bước 5: Hiển thị kết quả
                echo '<div class="result">';
                echo '<h3>Đặt Tour Thành Công!</h3>';
                echo '<p><strong>Tên tour:</strong> ' . htmlspecialchars($tenTour) . '</p>';
                echo '<p><strong>Phân loại:</strong> ' . $icon . ' ' . $phanLoai . '</p>';
                echo '<p><strong>Giá tour:</strong> ' . number_format($giaTour, 0, ',', '.') . ' VNĐ/người</p>';
                echo '<p><strong>Số người:</strong> ' . $soNguoi . ' người</p>';
                echo '<hr>';
                echo '<p class="highlight">Tổng tiền: ' . number_format($tongTien, 0, ',', '.') . ' VNĐ</p>';
                echo '</div>';
            }
        }
        ?>
    </div>
</body>
</html>
