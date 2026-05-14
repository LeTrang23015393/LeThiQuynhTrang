<?php
/**
 * File kiểm tra kết nối cơ sở dữ liệu
 */

require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra kết nối MySQL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .success {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
        .info-box {
            padding: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #333;
            color: white;
            text-decoration: none;
            margin-top: 20px;
        }
        .btn:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kiểm tra kết nối MySQL</h1>
        
        <div class="success">
            Kết nối cơ sở dữ liệu thành công
        </div>
        
        <div class="info-box">
            <strong>Host:</strong> <?php echo DB_HOST; ?>
        </div>
        
        <div class="info-box">
            <strong>Database:</strong> <?php echo DB_NAME; ?>
        </div>
        
        <div class="info-box">
            <strong>User:</strong> <?php echo DB_USER; ?>
        </div>
        
        <div class="info-box">
            <strong>Charset:</strong> <?php echo $conn->character_set_name(); ?>
        </div>
        
        <div class="info-box">
            <strong>Server Info:</strong> <?php echo $conn->server_info; ?>
        </div>
        
        <div class="info-box">
            <strong>Protocol Version:</strong> <?php echo $conn->protocol_version; ?>
        </div>
        
        <a href="list_users.php" class="btn">Xem danh sách người dùng</a>
    </div>
</body>
</html>
<?php
closeConnection();
?>
