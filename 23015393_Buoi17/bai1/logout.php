<?php
session_start();

// Xóa tất cả session
$_SESSION = [];

// Hủy session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Hủy session
session_destroy();

// Chuyển về trang đăng nhập
header('Location: login.html');
exit();
?>
