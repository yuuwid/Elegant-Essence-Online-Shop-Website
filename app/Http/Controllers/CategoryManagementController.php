<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryManagementController extends Controller
{

    public function list_category()
    {
        $categories = Category::paginate(5);

        return view('admin.m-category.list-category', [
            'title' => "Admin | Dashboard",
            'categories' => $categories,
        ]);
    }


    public function search_category(Request $request)
    {
        $keyword = $request->keyword;

        $categories = Category::where('category', 'like', '%' . $keyword . '%')
            ->paginate(5);

        return view('admin.m-category.list-category', [
            'title' => "Admin | Dashboard",
            'categories' => $categories,
            'keyword' => $keyword,
        ]);
    }

    public function index_add_category()
    {

        return view('admin.m-category.add-category', [
            'title' => "Admin | Dashboard",
        ]);
    }


    public function add_category(Request $request)
    {
        $request->validate([
            'logo' => 'required|image',
            'category' => 'required',
        ]);

        $logo = $request->file('logo');
        $logoName = time() . '.' . $logo->getClientOriginalExtension();
        $logo->move(public_path('images/upload/categories'), $logoName);

        Category::create([
            'category' => $request->get('category'),
            'slug_category' => random_int(10, 99) . Str::slug($request->get('category')),
            'logo' => 'images/upload/categories/' . $logoName,
        ]);

        return redirect()->route('admin.m.list_categories')->with(['success' => [
            'msg' => "Berhasil <b>Menambahkan Data</b>."
        ]]);
    }

    public function info_category($slug_category)
    {
        $category = Category::where('slug_category', $slug_category)->get()->first();

        return view('admin.m-category.info-category', [
            'title' => "Admin | Dashboard",
            'category' => $category,
        ]);
    }


    public function update_category(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'slug_category' => 'required',
        ]);


        if ($request->has('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('images/upload/categories'), $logoName);
            $logo_temp = 'images/upload/categories/' . $logoName;

            $old_logo = Category::where('slug_category', $request->get('slug_category'))->get('logo')->first()['logo'];
            if (str_contains($old_logo, 'root') == false) {
                unlink(public_path($old_logo));
            }
        } else {
            $logo_temp = Category::where('slug_category', $request->get('slug_category'))->get('logo')->first()['logo'];
        }


        Category::where('slug_category', $request->get('slug_category'))->update([
            'category' => $request->get('category'),
            'slug_category' => random_int(10, 99) . Str::slug($request->get('category')),
            'logo' => $logo_temp,
        ]);

        return redirect()->route('admin.m.list_categories')->with(['success' => [
            'msg' => "Berhasil <b>Memperbarui Data</b>."
        ]]);
    }


    public function delete_category($slug_category)
    {
        $old_logo = Category::where('slug_category', $slug_category)->get('logo')->first()['logo'];

        if (str_contains($old_logo, 'root') == false) {
            unlink(public_path($old_logo));
        }

        Category::where('slug_category', $slug_category)->delete();

        return redirect()->route('admin.m.list_categories')->with(['success' => [
            'msg' => "Berhasil <b>Menghapus Data</b>."
        ]]);
    }
}
