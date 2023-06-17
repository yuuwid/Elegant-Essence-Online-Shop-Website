<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\Size;
use App\Models\TempImage;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;

class ProdukManagementController extends Controller
{


    public function list_produk()
    {
        $products = Product::with(['brand', 'category', 'images', 'variants'])
            ->paginate(5);
        return view('admin.m-produk.list-produk', [
            'title' => "Admin | Dashboard",
            'products' => $products,
        ]);
    }

    public function search_produk(Request $request)
    {
        $keyword = $request->keyword;

        $products = Product::with(['brand', 'category', 'images', 'variants'])
            ->where('product_name', 'like', '%' . $keyword . '%')
            ->paginate(5);

        return view('admin.m-produk.list-produk', [
            'title' => "Admin | Dashboard",
            'products' => $products,
            'keyword' => $keyword,
        ]);
    }

    public function index_add_produk()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();

        return view('admin.m-produk.add-produk', [
            'title' => "Admin | Add Produk",
            'brands' => $brands,
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }

    private function _create_rule($req)
    {
        $rules = [
            'product_name' => 'required',
            'thumbnail' => 'required',
            'slug_brand' => 'required|not_in:-1',
            'slug_category' => 'required|not_in:-1',
        ];

        foreach ($req as $key => $value) {
            if (strpos($key, 'price-') === 0) {
                $index = substr($key, strlen('price-'));
                $rules["price-$index"] = 'required|numeric';
            } elseif (strpos($key, 'discount-') === 0) {
                $index = substr($key, strlen('discount-'));
                $rules["discount-$index"] = 'required|numeric';
            } elseif (strpos($key, 'stock-') === 0) {
                $index = substr($key, strlen('stock-'));
                $rules["stock-$index"] = 'required|numeric';
            } elseif (strpos($key, 'id_color-') === 0) {
                $index = substr($key, strlen('id_color-'));
                $rules["id_color-$index"] = 'required|numeric';
            } elseif (strpos($key, 'id_size-') === 0) {
                $index = substr($key, strlen('id_size-'));
                $rules["id_size-$index"] = 'required|numeric';
            }
        }

        return $rules;
    }

    private function _explode_variants($req)
    {
        $variants = [];

        foreach ($req as $key => $value) {
            if (
                strpos($key, 'price-') === 0 ||
                strpos($key, 'discount-') === 0 ||
                strpos($key, 'stock-') === 0 ||
                strpos($key, 'id_color-') === 0 ||
                strpos($key, 'id_size-') === 0
            ) {
                $parts = explode("-", $key);
                $index = intval($parts[1]);
                $field = $parts[0];

                if (!isset($variants[$index])) {
                    $variants[$index] = [];
                }

                $variants[$index][$field] = $value;
            }
        }

        // Optional: Sort the array by index
        ksort($variants);

        return [
            '_token' => $req['_token'],
            'product_name' => $req['product_name'],
            'description' => $req['description'],
            'id_brand' => Brand::where('slug_brand', $req['slug_brand'])->get('id_brand')->first()->id_brand,
            'id_category' => Category::where('slug_category', $req['slug_category'])->get('id_category')->first()->id_category,
            'thumbnail' => $req['thumbnail'] ?? null,
            'images' => $req['images'] ?? null,
            'variants' => $variants,
        ];
    }

    public function add_produk(Request $request)
    {
        $req = $request->all();
        // dd($req);
        // $req['thumbnail'] = $req['thumbnail'] ?? null;

        $request->validate($this->_create_rule($req));

        // $this->validate($request, $this->_create_rule($req));

        $data = collect($this->_explode_variants($req));


        // INSERT PRODUCT
        $id_product = Product::create([
            'product_name' => $data['product_name'],
            'slug_product' => random_int(1000, 9999) . '-' . Str::slug($data['product_name']),
            'description' => $data['description'],
            'id_brand' => $data['id_brand'],
            'id_category' => $data['id_category'],
        ])->id_product;

        // INSERT VARIANTS
        foreach ($data['variants'] as $v) {
            Variant::create([
                'id_product' => $id_product,
                'price' => $v['price'],
                'discount' => $v['discount'],
                'stock' => $v['stock'],
                'id_size' => $v['id_size'],
                'id_color' => $v['id_color'],
            ]);
        }

        // MOVE THUMNBAIL FROM TEMP
        $temp_img = TempImage::where('id_temp_img', $req['thumbnail'])->get()->first();

        $temp_file = public_path('images/upload/temp/' . $temp_img->filename);
        $path_file = 'images/upload/produk/' . $temp_img->filename;
        $upload_file = public_path($path_file);

        // Move File
        File::move($temp_file, $upload_file);
        // Add to table images
        Image::create([
            'path_image' => $path_file,
            'id_product' => $id_product,
            'thumnbail' => true,
        ]);
        TempImage::where('id_temp_img', $req['thumbnail'])->delete();

        // Move Batch Images
        foreach (explode('-', $req['batch_images']) as $id_img) {
            $temp_img = TempImage::where('id_temp_img', $id_img)->get()->first();

            $temp_file = public_path('images/upload/temp/' . $temp_img->filename);

            $path_file = 'images/upload/produk/' . $temp_img->filename;
            $upload_file = public_path($path_file);

            // Move File
            File::move($temp_file, $upload_file);
            // Add to table images
            Image::create([
                'path_image' => $path_file,
                'id_product' => $id_product,
                'thumnbail' => false,
            ]);
            TempImage::where('id_temp_img', $id_img)->delete();
        }
        return back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function index_detail_produk()
    {
        return;
    }

    public function update_produk()
    {
        return;
    }
}
