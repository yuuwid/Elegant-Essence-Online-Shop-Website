<?php

namespace App\Http\Controllers;

use App\Models\Product;
use view;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->latest()->limit(20)->get();

        return view('user.home.landingpage');
    }
}
