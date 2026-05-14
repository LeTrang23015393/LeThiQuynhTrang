<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', sans-serif; background: linear-gradient(135deg, #11998e, #38ef7d); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .container { background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); width: 100%; max-width: 400px; }
        h2 { text-align: center; color: #333; margin-bottom: 24px; font-size: 26px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 6px; color: #555; font-weight: 600; font-size: 14px; }
        input { width: 100%; padding: 10px 14px; border: 1px solid #ddd; border-radius: 8px; font-size: 15px; transition: border-color .2s; }
        input:focus { outline: none; border-color: #11998e; }
        .btn { width: 100%; padding: 12px; background: linear-gradient(135deg, #11998e, #38ef7d); color: #fff; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 8px; transition: opacity .2s; }
        .btn:hover { opacity: .9; }
        .error { background: #ffe0e0; color: #c0392b; padding: 10px 14px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
        .link { text-align: center; margin-top: 16px; font-size: 14px; color: #666; }
        .link a { color: #11998e; text-decoration: none; font-weight: 600; }
        .link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="container">
    <h2> Đăng Nhập</h2>

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="error"><?= htmlspecialchars($_SESSION['error']) ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form action="process_login.php" method="POST">
        <div class="form-group">
            <label>Tên đăng nhập</label>
            <input type="text" name="username" placeholder="Nhập tên đăng nhập" required>
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" placeholder="Nhập mật khẩu" required>
        </div>
        <button type="submit" class="btn">Đăng Nhập</button>
    </form>

    <div class="link">Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></div>
</div>
</body>
</html>