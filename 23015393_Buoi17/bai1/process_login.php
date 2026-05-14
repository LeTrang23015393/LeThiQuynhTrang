<?php
session_start();

// Tài khoản hợp lệ được khai báo cố định
define('VALID_USERNAME', 'admin');
define('VALID_PASSWORD', 'Admin@123');

// Kiểm tra phương thức POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.html');
    exit();
}

// Lấy dữ liệu từ form
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// Kiểm tra dữ liệu đầu vào
$errors = [];

if (empty($username)) {
    $errors[] = 'Vui lòng nhập tên đăng nhập';
}

if (empty($password)) {
    $errors[] = 'Vui lòng nhập mật khẩu';
}

// Nếu có lỗi, quay lại trang đăng nhập
if (!empty($errors)) {
    $_SESSION['login_errors'] = $errors;
    header('Location: login.html');
    exit();
}

// Kiểm tra tài khoản
if ($username === VALID_USERNAME && $password === VALID_PASSWORD) {
    // Đăng nhập thành công
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['login_time'] = date('Y-m-d H:i:s');
    
    // Chuyển đến trang thành công
    header('Location: success.php');
    exit();
} else {
    // Đăng nhập thất bại
    $_SESSION['login_error'] = 'Tên đăng nhập hoặc mật khẩu không đúng';
    header('Location: login.html');
    exit();
}
?>
