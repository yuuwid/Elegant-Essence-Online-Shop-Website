<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
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
        ]);

        Brand::create([
            'brand' => "Nike",
            'slug_brand' => "nike",
        ]);
    }
}
