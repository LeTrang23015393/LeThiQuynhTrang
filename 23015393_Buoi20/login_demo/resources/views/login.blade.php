<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>ĐĂNG NHẬP</h1>

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div>Username</div>
        <input type="text" name="username">
        <br><br>
        <div>Password</div>
        <input type="password" name="password">
        <br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
