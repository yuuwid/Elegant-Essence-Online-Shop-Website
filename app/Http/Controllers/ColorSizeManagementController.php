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
            if ($request->get('search-by-category') != 'null') {
                $id_category = Category::where('slug_category', $request->get('search-by-category'))
                    ->get('id_category')
                    ->first()['id_category'];

                $sizes = Size::with('category')->withCount('variants')
                    ->where('id_category', $id_category)
                    ->paginate(10);
            } else {
                $sizes = Size::with('category')->withCount('variants')
                    ->where('id_category', null)
                    ->paginate(10);
            }
        } else {
            $sizes = Size::with('category')->withCount('variants')->paginate(10, ['*'], 'page-sizes');
        }
        $colors = Color::withCount('variants')->paginate(10, ['*'], 'page-colors');

        return view('admin.m-color-size.list-color-size', [
            'title' => "Admin | Dashboard",
            'categories' => $categories,
            'sizes' => $sizes,
            'colors' => $colors,
        ]);
    }


    public function add_size(Request $request)
    {
        $this->validate($request, [
            'size' => 'required',
            'slug_category' => 'required',
        ]);

        $id_category = Category::where('slug_category', $request->get('slug_category'))
            ->get('id_category')->first()['id_category'];

        Size::create([
            'size' => $request->get('size'),
            'id_category' => $id_category
        ]);

        return redirect()->back()->with(['success' => [
            'msg' => "Berhasil menambahkan data"
        ]]);
    }

    // REST API
    public function api_get_size_by_id($id_size)
    {
        $sizes = Size::with('category')
            ->where('id_size', $id_size)
            ->get()->first();

        return response()->json($sizes);
    }

    public function api_update_size(Request $request)
    {
        if ($request->get('size') == '') {
            return response()->json(false);
        }

        $id_category = Category::where('slug_category', $request->get('slug_category'))
            ->get('id_category')->first()['id_category'];

        Size::where('id_size', $request->get('id_size'))->update([
            'size' => $request->get('size'),
            'id_category' => $id_category
        ]);

        return response()->json(true);
    }

    public function api_delete_size($id_size)
    {
        Size::where('id_size', $id_size)->delete();

        return response()->json(true);
    }



    public function add_color(Request $request)
    {
        $this->validate($request, [
            'color' => 'required',
            'hex' => 'required',
        ]);


        Color::create([
            'color' => $request->get('color'),
            'hex' => str_replace('#', '', $request->get('hex'))
        ]);

        return redirect()->back()->with(['success' => [
            'msg' => "Berhasil menambahkan data"
        ]]);
    }

    // REST API
    public function api_get_color_by_id($id_color)
    {
        $color = Color::where('id_color', $id_color)
            ->get()->first();

        return response()->json($color);
    }

    public function api_update_color(Request $request)
    {
        if ($request->get('color') == '') {
            return response()->json(false);
        }
        if ($request->get('hex') == '') {
            return response()->json(false);
        }

        Color::where('id_color', $request->get('id_color'))->update([
            'color' => $request->get('color'),
            'hex' => str_replace('#', '', $request->get('hex'))
        ]);

        return response()->json(true);
    }

    public function api_delete_color($id_color)
    {
        Color::where('id_color', $id_color)->delete();

        return response()->json(true);
    }
}
