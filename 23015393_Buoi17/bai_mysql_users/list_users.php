<?php
/**
 * File hiển thị danh sách người dùng từ bảng users
 */

require_once 'db.php';

// Truy vấn danh sách người dùng
$sql = "SELECT id, username, full_name, email, created_at FROM users ORDER BY id ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .info {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background: #333;
            color: white;
            padding: 10px;
            text-align: left;
        }
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .no-data {
            text-align: center;
            padding: 20px;
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
        <h1>Danh sách người dùng</h1>
        
        <?php if ($result && $result->num_rows > 0): ?>
            <div class="info">
                Tổng số người dùng: <strong><?php echo $result->num_rows; ?></strong>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên đăng nhập</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-data">
                Không có dữ liệu người dùng trong hệ thống.
            </div>
        <?php endif; ?>
        
        <a href="test_connection.php" class="btn">Quay lại kiểm tra kết nối</a>
    </div>
</body>
</html>
<?php
closeConnection();
?>
