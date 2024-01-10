<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
            'email' => 'required|email|unique:users',
        ]);
        if($request->password==$request->confirm_password)
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'image' => 'images/default.png'
        ]);

        // Additional logic (e.g., login the user) can be added here

        return redirect('/login')->with('success', 'Registration successful!');
    }
}
