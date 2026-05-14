<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password']      ?? '';


if (empty($username) || empty($password)) {
    $_SESSION['error'] = 'Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.';
    header('Location: login.php');
    exit;
}


$stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
$stmt->execute([$username]);
$user = $stmt->fetch();


if (!$user || !password_verify($password, $user['password'])) {
    $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không đúng.';
    header('Location: login.php');
    exit;
}

session_regenerate_id(true);
$_SESSION['user_id']   = $user['id'];
$_SESSION['username']  = $user['username'];
$_SESSION['full_name'] = $user['full_name'];
$_SESSION['role']      = $user['role'];

header('Location: home.php');
exit;