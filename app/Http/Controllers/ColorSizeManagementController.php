<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class ColorSizeManagementController extends Controller
{


    public function list_color_size(Request $request)
    {
        $categories = Category::all(['category', 'slug_category']);


        if ($request->has('search-by-category')) {
            $id_category = Category::where('slug_category', $request->get('search-by-category'))
                ->get('id_category')
                ->first()['id_category'];

            $sizes = Size::with('category')->withCount('variants')
                ->where('id_category', $id_category)
                ->paginate(10);
        } else {
            $sizes = Size::with('category')->withCount('variants')->paginate(10);
        }
        $colors = Color::withCount('variants')->paginate(10);


        return view('admin.m-color-size.list-color-size', [
            'title' => "Admin | Dashboard",
            'categories' => $categories,
            'sizes' => $sizes,
            'colors' => $colors,
        ]);
    }




    // REST API
    public function get_size_byId($id_size)
    {
        $sizes = Size::with('category')
            ->where('id_size', $id_size)
            ->paginate(10);
    }
}
