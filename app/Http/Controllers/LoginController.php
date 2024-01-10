<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        // Đăng nhập thất bại
        return back()->withErrors(['email' => 'Đăng nhập thất bại'])->withInput();
        
    }
    public function logout()
{
    Auth::logout();
    
    return redirect('/');
}

public function index()
{
    $user = Auth::user();
    return view('home', compact('user'));
}
}
