<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>ĐĂNG NHẬP THÀNH CÔNG</h1>
    <p>Xin chào: {{ session('username') }}</p>
    <a href="{{ url('/logout') }}">Logout</a>
</body>
</html>
