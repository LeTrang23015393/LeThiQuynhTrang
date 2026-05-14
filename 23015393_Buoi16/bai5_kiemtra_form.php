<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Tour Du Lịch</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        
        .container {
            background: white;
            padding: 30px;
            border: 1px solid #ddd;
            max-width: 500px;
            margin: 0 auto;
        }
        
        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: normal;
        }
        
        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        
        input:focus,
        select:focus {
            outline: none;
            border-color: #666;
        }
        
        .error {
            color: #d00;
            font-size: 13px;
            margin-top: 3px;
            display: block;
        }
        
        .error-input {
            border-color: #d00 !important;
        }
        
        button {
            width: 100%;
            padding: 10px;
            background: #333;
            color: white;
            border: none;
            font-size: 14px;
            cursor: pointer;
        }
        
        button:hover {
            background: #555;
        }
        
        .success-message {
            background: #f0f0f0;
            border: 1px solid #ccc;
            padding: 20px;
        }
        
        .success-message h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 20px;
        }
        
        .success-message p {
            margin: 8px 0;
            font-size: 14px;
            color: #333;
        }
        
        .success-message strong {
            color: #000;
        }
        
        .back-button {
            margin-top: 15px;
            background: #666;
        }
        
        .back-button:hover {
            background: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Khởi tạo biến
        $errors = [];
        $success = false;
        $hoTen = $soDienThoai = $email = $diemDen = $soNguoi = "";
        
        // Xử lý khi form được submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $hoTen = trim($_POST['hoTen'] ?? '');
            $soDienThoai = trim($_POST['soDienThoai'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $diemDen = $_POST['diemDen'] ?? '';
            $soNguoi = $_POST['soNguoi'] ?? '';
            
            // Kiểm tra họ tên
            if (empty($hoTen)) {
                $errors['hoTen'] = "Họ tên không được để trống";
            }
            
            // Kiểm tra số điện thoại
            if (empty($soDienThoai)) {
                $errors['soDienThoai'] = "Số điện thoại không được để trống";
            }
            
            // Kiểm tra email
            if (empty($email)) {
                $errors['email'] = "Email không được để trống";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email không hợp lệ";
            }
            
            // Kiểm tra điểm đến
            if (empty($diemDen)) {
                $errors['diemDen'] = "Vui lòng chọn điểm đến";
            }
            
            // Kiểm tra số người
            if (empty($soNguoi)) {
                $errors['soNguoi'] = "Số người không được để trống";
            } elseif (!is_numeric($soNguoi)) {
                $errors['soNguoi'] = "Số người phải là số";
            } elseif ($soNguoi <= 0) {
                $errors['soNguoi'] = "Số người phải lớn hơn 0";
            }
            
            // Nếu không có lỗi, đặt tour thành công
            if (empty($errors)) {
                $success = true;
            }
        }
        ?>
        
        <?php if ($success): ?>
            <!-- Hiển thị thông báo thành công -->
            <div class="success-message">
                <h3>Đặt tour thành công</h3>
                <p><strong>Họ tên:</strong> <?php echo htmlspecialchars($hoTen); ?></p>
                <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($soDienThoai); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p><strong>Điểm đến:</strong> <?php echo htmlspecialchars($diemDen); ?></p>
                <p><strong>Số người:</strong> <?php echo htmlspecialchars($soNguoi); ?></p>
                <button class="back-button" onclick="window.location.href=''">Đặt tour mới</button>
            </div>
        <?php else: ?>
            <!-- Hiển thị form -->
            <h2>Đặt Tour Du Lịch</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="hoTen">Họ tên <span style="color: red;">*</span></label>
                    <input 
                        type="text" 
                        id="hoTen" 
                        name="hoTen" 
                        value="<?php echo htmlspecialchars($hoTen); ?>"
                        class="<?php echo isset($errors['hoTen']) ? 'error-input' : ''; ?>"
                        placeholder="Nhập họ tên của bạn"
                    >
                    <?php if (isset($errors['hoTen'])): ?>
                        <span class="error"><?php echo $errors['hoTen']; ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="soDienThoai">Số điện thoại <span style="color: red;">*</span></label>
                    <input 
                        type="tel" 
                        id="soDienThoai" 
                        name="soDienThoai" 
                        value="<?php echo htmlspecialchars($soDienThoai); ?>"
                        class="<?php echo isset($errors['soDienThoai']) ? 'error-input' : ''; ?>"
                        placeholder="Nhập số điện thoại"
                    >
                    <?php if (isset($errors['soDienThoai'])): ?>
                        <span class="error"><?php echo $errors['soDienThoai']; ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="email">Email <span style="color: red;">*</span></label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="<?php echo htmlspecialchars($email); ?>"
                        class="<?php echo isset($errors['email']) ? 'error-input' : ''; ?>"
                        placeholder="Nhập email của bạn"
                    >
                    <?php if (isset($errors['email'])): ?>
                        <span class="error"><?php echo $errors['email']; ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="diemDen">Điểm đến <span style="color: red;">*</span></label>
                    <select 
                        id="diemDen" 
                        name="diemDen"
                        class="<?php echo isset($errors['diemDen']) ? 'error-input' : ''; ?>"
                    >
                        <option value="">-- Chọn điểm đến --</option>
                        <option value="Hà Nội" <?php echo $diemDen == 'Hà Nội' ? 'selected' : ''; ?>>Hà Nội</option>
                        <option value="Đà Nẵng" <?php echo $diemDen == 'Đà Nẵng' ? 'selected' : ''; ?>>Đà Nẵng</option>
                        <option value="Nha Trang" <?php echo $diemDen == 'Nha Trang' ? 'selected' : ''; ?>>Nha Trang</option>
                        <option value="Phú Quốc" <?php echo $diemDen == 'Phú Quốc' ? 'selected' : ''; ?>>Phú Quốc</option>
                        <option value="Đà Lạt" <?php echo $diemDen == 'Đà Lạt' ? 'selected' : ''; ?>>Đà Lạt</option>
                        <option value="Sapa" <?php echo $diemDen == 'Sapa' ? 'selected' : ''; ?>>Sapa</option>
                    </select>
                    <?php if (isset($errors['diemDen'])): ?>
                        <span class="error"><?php echo $errors['diemDen']; ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="soNguoi">Số người <span style="color: red;">*</span></label>
                    <input 
                        type="number" 
                        id="soNguoi" 
                        name="soNguoi" 
                        value="<?php echo htmlspecialchars($soNguoi); ?>"
                        class="<?php echo isset($errors['soNguoi']) ? 'error-input' : ''; ?>"
                        placeholder="Nhập số người tham gia"
                        min="1"
                    >
                    <?php if (isset($errors['soNguoi'])): ?>
                        <span class="error"><?php echo $errors['soNguoi']; ?></span>
                    <?php endif; ?>
                </div>
                
                <button type="submit">Đặt Tour Ngay</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
