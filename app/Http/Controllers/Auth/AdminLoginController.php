<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (Auth::guard('admin')->attempt([
            'userName' => $request->input('userName'),
            'password' => $request->input('password'),
        ])) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'userName' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'userName' => ['required'],
            'password' => ['required'],
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
