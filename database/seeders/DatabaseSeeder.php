<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'full_name' => 'Admin',
            'nip' => '123456',
            'password' => bcrypt('123456'),
            'nik' => '1234567890',
        ]);

        Color::create([
            'color' => 'Biru',
            'hex' => "000bdb"
        ]);

        Color::create([
            'color' => 'Merah',
            'hex' => "db0000"
        ]);


        $this->call([
            BrandSeeder::class,
            KategoriSeeder::class,
            ProdukSeeder::class,
        ]);

        Size::create([
            'size' => "30",
            'id_category' => 1,
        ]);

        Size::create([
            'size' => "31",
            'id_category' => 1,
        ]);

        Size::create([
            'size' => "32",
            'id_category' => 1,
        ]);

        Size::create([
            'size' => "M",
            'id_category' => 2,
        ]);

        Size::create([
            'size' => "XL",
            'id_category' => 2,
        ]);
    }
}
