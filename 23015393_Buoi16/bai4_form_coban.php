<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đặt Tour</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            background-color: #e8f5e9;
            padding: 20px;
            border-radius: 4px;
            margin-top: 20px;
            border-left: 4px solid #4CAF50;
        }
        .result h3 {
            color: #2e7d32;
            margin-top: 0;
        }
        .result p {
            margin: 10px 0;
            color: #333;
        }
        .result strong {
            color: #1b5e20;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🌴 Form Đặt Tour Du Lịch</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="hoten">Họ tên:</label>
                <input type="text" id="hoten" name="hoten" required>
            </div>
            
            <div class="form-group">
                <label for="diemden">Điểm đến:</label>
                <input type="text" id="diemden" name="diemden" required>
            </div>
            
            <div class="form-group">
                <label for="songuoi">Số người:</label>
                <input type="number" id="songuoi" name="songuoi" min="1" required>
            </div>
            
            <button type="submit" name="submit">Đặt Tour</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $hoten = htmlspecialchars($_POST['hoten']);
            $diemden = htmlspecialchars($_POST['diemden']);
            $songuoi = htmlspecialchars($_POST['songuoi']);
            
            echo '<div class="result">';
            echo '<h3>✅ Thông tin đặt tour</h3>';
            echo '<p><strong>Họ tên khách hàng:</strong> ' . $hoten . '</p>';
            echo '<p><strong>Điểm đến:</strong> ' . $diemden . '</p>';
            echo '<p><strong>Số người:</strong> ' . $songuoi . '</p>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
