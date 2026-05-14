<?php
session_start();

// Kiểm tra đã đăng nhập chưa
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập thành công</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .user-info {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 20px 0;
        }
        .user-info p {
            margin: 10px 0;
        }
        .btn-logout {
            display: inline-block;
            padding: 10px 20px;
            background: #333;
            color: white;
            text-decoration: none;
        }
        .btn-logout:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <h2>Đăng nhập thành công</h2>
        
        <div class="user-info">
            <p><strong>Tên đăng nhập:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <p><strong>Thời gian đăng nhập:</strong> <?php echo htmlspecialchars($_SESSION['login_time']); ?></p>
            <p><strong>Session ID:</strong> <?php echo htmlspecialchars(session_id()); ?></p>
        </div>
        
        <a href="logout.php" class="btn-logout">Đăng xuất</a>
    </div>
</body>
</html>
