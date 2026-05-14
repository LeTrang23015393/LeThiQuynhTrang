<?php


// Thông tin kết nối
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ltweb_users');

// Tạo kết nối
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thiết lập charset UTF-8
$conn->set_charset("utf8mb4");

// Hàm đóng kết nối (tùy chọn, PHP tự động đóng)
function closeConnection() {
    global $conn;
    if ($conn) {
        $conn->close();
    }
}
?>
