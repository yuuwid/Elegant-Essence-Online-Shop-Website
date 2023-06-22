<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Size;
use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'color' => "Merah",
            'hex' => 'ff0f0f',
        ]);
        Color::create([
            'color' => "Biru",
            'hex' => '0f0fff',
        ]);
        Color::create([
            'color' => "Hijau",
            'hex' => '0fff0f',
        ]);
        Color::create([
            'color' => "Hitam",
            'hex' => '000000',
        ]);
        Color::create([
            'color' => "Hijau",
            'hex' => 'ffffff',
        ]);


        Size::create([
            'size' => "M",
            'id_category' => 1,
        ]);
        Size::create([
            'size' => "L",
            'id_category' => 1,
        ]);
        Size::create([
            'size' => "XL",
            'id_category' => 1,
        ]);
        Size::create([
            'size' => "XXL",
            'id_category' => 1,
        ]);

        Size::create([
            'size' => "M",
            'id_category' => 2,
        ]);
        Size::create([
            'size' => "L",
            'id_category' => 2,
        ]);
        Size::create([
            'size' => "XL",
            'id_category' => 2,
        ]);
        Size::create([
            'size' => "XXL",
            'id_category' => 2,
        ]);

        Size::create([
            'size' => "40",
            'id_category' => 3,
        ]);
        Size::create([
            'size' => "41",
            'id_category' => 3,
        ]);
        Size::create([
            'size' => "42",
            'id_category' => 3,
        ]);
        Size::create([
            'size' => "43",
            'id_category' => 3,
        ]);


    }
}
