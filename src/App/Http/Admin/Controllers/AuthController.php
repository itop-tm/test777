<?php

namespace App\Http\Admin\Controllers;

use App\Http\BaseController as Controller;
use Illuminate\Http\Request;
use Domain\Users\Models\User;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function showLoginPage()
    {
        return view('admin.auth.login');
    }

    public function login(Request $r)
    {
        $r->validate([
            'email'    => 'required|email|exists:users',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $r->email)
        ->where('role', 'admin')
        ->first();

        if (!Hash::check($r->password, $user->password)) {
            return back()
                    ->withInput()
                    ->withErrors(['password' => 'invalid password']);
        }

        Auth::guard('admin')->login($user, (bool)$r->remember);

        return redirect()
                ->route('admin.dashboard');
    }

    public function logout(Request $r)
    {
        Auth::guard('admin')->logout();

        return redirect()
                ->route('admin.login.page');
    }

    public function changePassword(
        Request $r
    ) {
        $r->validate([
            'old_password'          => 'required|string',
            'password'              => 'required|string|confirmed',
            'password_confirmation' => 'required|string'
        ]);

        $user = $r->user('admin');


        if (!Hash::check($r->password, $user->password)) {
            return back()
                    ->withErrors(['old_password' => 'invalid password']);
        }

        Admin::where('email', $user->email)->update([
            'password' => Hash::make($r->password)
        ]);

        return redirect()
                ->back()
                ->with('success', 'Password successfully changed');
    }
}
