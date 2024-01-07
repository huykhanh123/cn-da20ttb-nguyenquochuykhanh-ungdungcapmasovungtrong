<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authentcation(LoginRequest $request)
    {
        $credentials = [
            'email' =>  $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác',
        ])->onlyInput('email');
    }
}
//quản lý quá trình đăng nhập của người dùng trong ứng dụng Laravel và điều hướng họ đến trang chủ 
//sau khi đăng nhập thành công hoặc hiển thị thông báo lỗi nếu đăng nhập không thành công.