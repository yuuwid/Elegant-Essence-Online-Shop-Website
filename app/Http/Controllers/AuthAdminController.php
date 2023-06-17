<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{

    public function login_form()
    {
        if (Auth::guard('web_admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.admin.login.index', [
            'title' => "Admin Login"
        ]);
    }

    public function handle_login(Request $request)
    {
        $attempt = Auth::guard('web_admin')->attempt($request->only(['nip', 'password']));

        if ($attempt) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()
            ->back()
            ->with('error', 'NIP atau Password Salah');
    }


    public function handle_logout()
    {
        Auth::guard('web_admin')
            ->logout();

        return redirect()
            ->route('admin.login');
    }
}
