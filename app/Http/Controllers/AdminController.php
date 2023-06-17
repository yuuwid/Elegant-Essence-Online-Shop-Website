<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.home.index', [
            'title' => "Admin | Dashboard"
        ]);
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.home.profile', [
            'title' => "Admin | Profile",
            'user' => $user,
        ]);
    }
}
