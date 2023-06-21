<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'brand' => "Adidas",
            'slug_brand' => "adidas",
            'logo' => "images/root/no-image.png",
        ]);

        Brand::create([
            'brand' => "Nike",
            'slug_brand' => "nike",
            'logo' => "images/root/no-image.png",
        ]);

        Brand::create([
            'brand' => "Polo",
            'slug_brand' => "polo",
            'logo' => "images/root/no-image.png",
        ]);

        Brand::create([
            'brand' => "Lainnya",
            'slug_brand' => "lainnya",
            'logo' => "images/root/no-image.png",
        ]);



        Category::create([
            'category' => "Baju",
            'slug_category' => "baju",
            'logo' => "images/root/no-image.png",
        ]);
        Category::create([
            'category' => "Celana",
            'slug_category' => "celana",
            'logo' => "images/root/no-image.png",
        ]);
        Category::create([
            'category' => "Sepatu",
            'slug_category' => "sepatu",
            'logo' => "images/root/no-image.png",
        ]);
    }
}
