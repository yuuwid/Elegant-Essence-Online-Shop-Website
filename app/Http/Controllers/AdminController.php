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
}
