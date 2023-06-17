<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandManagementController extends Controller
{

    public function list_brand()
    {
        $brands = Brand::paginate(5);

        return view('admin.m-brand.list-brand', [
            'title' => "Admin | Dashboard",
            'brands' => $brands,
        ]);
    }


    public function search_brand(Request $request)
    {
        $keyword = $request->keyword;

        $brands = Brand::where('brand', 'like', '%' . $keyword . '%')
            ->paginate(5);

        return view('admin.m-brand.list-brand', [
            'title' => "Admin | Dashboard",
            'brands' => $brands,
            'keyword' => $keyword,
        ]);
    }

    public function index_add_brand()
    {

        return view('admin.m-brand.add-brand', [
            'title' => "Admin | Dashboard",
        ]);
    }

    public function add_brand(Request $request)
    {
        $request->validate([
            'logo' => 'required|image',
            'brand' => 'required',
        ]);

        $logo = $request->file('logo');
        $logoName = time() . '.' . $logo->getClientOriginalExtension();
        $logo->move(public_path('images/upload/brands'), $logoName);

        Brand::create([
            'brand' => $request->get('brand'),
            'slug_brand' => random_int(10, 99) . Str::slug($request->get('brand')),
            'logo' => 'images/upload/brands/' . $logoName,
        ]);

        return redirect()->route('admin.m.list_brand')->with(['success' => [
            'msg' => "Berhasil <b>Menambahkan Data</b>."
        ]]);
    }

    public function info_brand($slug_brand)
    {
        $brand = Brand::where('slug_brand', $slug_brand)->get()->first();

        return view('admin.m-brand.info-brand', [
            'title' => "Admin | Dashboard",
            'brand' => $brand,
        ]);
    }


    public function update_brand(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'slug_brand' => 'required',
        ]);


        if ($request->has('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('images/upload/brands'), $logoName);
            $logo_temp = 'images/upload/brands/' . $logoName;

            $old_logo = Brand::where('slug_brand', $request->get('slug_brand'))->get('logo')->first()['logo'];
            if (str_contains($old_logo, 'root') == false) {
                unlink(public_path($old_logo));
            }
        } else {
            $logo_temp = Brand::where('slug_brand', $request->get('slug_brand'))->get('logo')->first()['logo'];
        }

        Brand::where('slug_brand', $request->get('slug_brand'))->update([
            'brand' => $request->get('brand'),
            'slug_brand' => random_int(10, 99) . Str::slug($request->get('brand')),
            'logo' => $logo_temp,
        ]);

        return redirect()->route('admin.m.list_brand')->with(['success' => [
            'msg' => "Berhasil <b>Memperbarui Data</b>."
        ]]);
    }

    public function delete_brand($slug_brand)
    {
        $old_logo = Brand::where('slug_brand', $slug_brand)->get('logo')->first()['logo'];

        if (str_contains($old_logo, 'root') == false) {
            unlink(public_path($old_logo));
        }

        Brand::where('slug_brand', $slug_brand)->delete();

        return redirect()->route('admin.m.list_brand')->with(['success' => [
            'msg' => "Berhasil <b>Menghapus Data</b>."
        ]]);
    }
}
