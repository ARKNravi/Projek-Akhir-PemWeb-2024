<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('profile.index', compact('admin'));
    }

    public function editUsername()
    {
        $admin = Auth::guard('admin')->user();
        return view('profile.edit-username', compact('admin'));
    }

    public function updateUsername(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'username' => 'required|string|max:255',
            'current_password' => 'required|string',
        ]);

        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        $admin->username = $request->username;
        $admin->save();

        return redirect()->route('profile.index')->with('status', 'Username updated successfully.');
    }

    public function editPassword()
    {
        $admin = Auth::guard('admin')->user();
        return view('profile.edit-password', compact('admin'));
    }

    public function updatePassword(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->route('profile.index')->with('status', 'Password updated successfully.');
    }
}