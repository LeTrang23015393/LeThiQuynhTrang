<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}


$full_name        = trim($_POST['full_name']        ?? '');
$username         = trim($_POST['username']         ?? '');
$email            = trim($_POST['email']            ?? '');
$password         = $_POST['password']              ?? '';
$confirm_password = $_POST['confirm_password']      ?? '';

if (empty($full_name) || empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
    $_SESSION['error'] = 'Vui lòng điền đầy đủ thông tin.';
    header('Location: register.php');
    exit;
}

if (strlen($username) < 4 || strlen($username) > 30) {
    $_SESSION['error'] = 'Tên đăng nhập phải từ 4 đến 30 ký tự.';
    header('Location: register.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'Email không đúng định dạng.';
    header('Location: register.php');
    exit;
}

if (strlen($password) < 8) {
    $_SESSION['error'] = 'Mật khẩu phải có ít nhất 8 ký tự.';
    header('Location: register.php');
    exit;
}

if ($password !== $confirm_password) {
    $_SESSION['error'] = 'Mật khẩu xác nhận không khớp.';
    header('Location: register.php');
    exit;
}

$stmt = $pdo->prepare('SELECT id FROM users WHERE username = ? OR email = ?');
$stmt->execute([$username, $email]);
$existing = $stmt->fetch();

if ($existing) {
   
    $stmtU = $pdo->prepare('SELECT id FROM users WHERE username = ?');
    $stmtU->execute([$username]);
    if ($stmtU->fetch()) {
        $_SESSION['error'] = 'Tên đăng nhập đã tồn tại.';
    } else {
        $_SESSION['error'] = 'Email đã được sử dụng.';
    }
    header('Location: register.php');
    exit;
}

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$stmt = $pdo->prepare('INSERT INTO users (username, email, password, full_name) VALUES (?, ?, ?, ?)');
$stmt->execute([$username, $email, $hashed_password, $full_name]);

$_SESSION['success'] = 'Đăng ký thành công! Bạn có thể đăng nhập.';
header('Location: register.php');
exit;