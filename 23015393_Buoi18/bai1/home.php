<?php
session_start();


if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$full_name = htmlspecialchars($_SESSION['full_name']);
$username  = htmlspecialchars($_SESSION['username']);
$role      = htmlspecialchars($_SESSION['role']);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', sans-serif; background: linear-gradient(135deg, #f093fb, #f5576c); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .container { background: #fff; padding: 50px 40px; border-radius: 16px; box-shadow: 0 10px 40px rgba(0,0,0,0.2); text-align: center; max-width: 500px; width: 100%; }
        .avatar { width: 80px; height: 80px; background: linear-gradient(135deg, #f093fb, #f5576c); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 36px; margin: 0 auto 20px; }
        h1 { color: #333; font-size: 28px; margin-bottom: 10px; }
        .info { background: #f8f9fa; border-radius: 10px; padding: 20px; margin: 20px 0; text-align: left; }
        .info p { margin-bottom: 10px; color: #555; font-size: 15px; }
        .info p:last-child { margin-bottom: 0; }
        .info strong { color: #333; }
        .badge { display: inline-block; padding: 3px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .badge-user { background: #d4edda; color: #155724; }
        .badge-admin { background: #cce5ff; color: #004085; }
        .btn-logout { display: inline-block; padding: 12px 30px; background: linear-gradient(135deg, #f093fb, #f5576c); color: #fff; text-decoration: none; border-radius: 8px; font-size: 15px; font-weight: 600; transition: opacity .2s; margin-top: 10px; }
        .btn-logout:hover { opacity: .85; }
    </style>
</head>
<body>
<div class="container">
    <div class="avatar"></div>
    <h1>Chào mừng, <?= $full_name ?>!</h1>
    <p style="color:#888; margin-bottom:10px;">Bạn đã đăng nhập thành công.</p>

    <div class="info">
        <p><strong>Họ và tên:</strong> <?= $full_name ?></p>
        <p><strong>Tên đăng nhập:</strong> <?= $username ?></p>
        <p><strong>Vai trò:</strong>
            <span class="badge <?= $role === 'admin' ? 'badge-admin' : 'badge-user' ?>">
                <?= $role ?>
            </span>
        </p>
    </div>

    <a href="logout.php" class="btn-logout"> Đăng Xuất</a>
</div>
</body>
</html>