<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if ($username == 'admin' && $password == '123456') {
            session([
                'isLogin'  => true,
                'username' => $username
            ]);
            return redirect('/dashboard');
        }

        return redirect('/login')
            ->with('error', 'Sai tên đăng nhập hoặc mật khẩu');
    }

    public function dashboard()
    {
        if (!session('isLogin')) {
            return redirect('/login');
        }
        return view('dashboard');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
