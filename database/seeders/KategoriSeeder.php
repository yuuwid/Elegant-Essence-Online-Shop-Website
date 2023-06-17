<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'category' => "Sepatu",
            'slug_category' => "sepatu"
        ]);

        Category::create([
            'category' => "Baju",
            'slug_category' => "baju"
        ]);
    }
}
