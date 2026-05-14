<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Tài Khoản</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', sans-serif; background: linear-gradient(135deg, #667eea, #764ba2); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .container { background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); width: 100%; max-width: 450px; }
        h2 { text-align: center; color: #333; margin-bottom: 24px; font-size: 26px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 6px; color: #555; font-weight: 600; font-size: 14px; }
        input { width: 100%; padding: 10px 14px; border: 1px solid #ddd; border-radius: 8px; font-size: 15px; transition: border-color .2s; }
        input:focus { outline: none; border-color: #667eea; }
        .btn { width: 100%; padding: 12px; background: linear-gradient(135deg, #667eea, #764ba2); color: #fff; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; margin-top: 8px; transition: opacity .2s; }
        .btn:hover { opacity: .9; }
        .error { background: #ffe0e0; color: #c0392b; padding: 10px 14px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
        .success { background: #d4edda; color: #155724; padding: 10px 14px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
        .link { text-align: center; margin-top: 16px; font-size: 14px; color: #666; }
        .link a { color: #667eea; text-decoration: none; font-weight: 600; }
        .link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="container">
    <h2> Đăng Ký</h2>

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="error"><?= htmlspecialchars($_SESSION['error']) ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['success'])): ?>
        <div class="success"><?= htmlspecialchars($_SESSION['success']) ?></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <form action="process_register.php" method="POST">
        <div class="form-group">
            <label>Họ và tên</label>
            <input type="text" name="full_name" placeholder="Nguyễn Văn A" required>
        </div>
        <div class="form-group">
            <label>Tên đăng nhập</label>
            <input type="text" name="username" placeholder="4–30 ký tự" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="example@email.com" required>
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" placeholder="Tối thiểu 8 ký tự" required>
        </div>
        <div class="form-group">
            <label>Xác nhận mật khẩu</label>
            <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
        </div>
        <button type="submit" class="btn">Đăng Ký</button>
    </form>

    <div class="link">Đã có tài khoản? <a href="login.php">Đăng nhập</a></div>
</div>
</body>
</html>