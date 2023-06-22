<?php

namespace Database\Seeders;

use App\Models\Expedition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpeditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Expedition::create([
            'vendor' => "JNE",
            'kota_tujuan' => "Surabaya",
            'fee' => 7000,
        ]);

        Expedition::create([
            'vendor' => "JNT",
            'kota_tujuan' => "Surabaya",
            'fee' => 7000,
        ]);

        Expedition::create([
            'vendor' => "SiCepat",
            'kota_tujuan' => "Surabaya",
            'fee' => 7000,
        ]);

        Expedition::create([
            'vendor' => "JNE",
            'kota_tujuan' => "Sidoarjo",
            'fee' => 10000,
        ]);

        Expedition::create([
            'vendor' => "JNT",
            'kota_tujuan' => "Sidoarjo",
            'fee' => 10000,
        ]);

        Expedition::create([
            'vendor' => "SiCepat",
            'kota_tujuan' => "Sidoarjo",
            'fee' => 10000,
        ]);


        Expedition::create([
            'vendor' => "JNE",
            'kota_tujuan' => "Jakarta",
            'fee' => 23000,
        ]);

        Expedition::create([
            'vendor' => "JNT",
            'kota_tujuan' => "Jakarta",
            'fee' => 24000,
        ]);

        Expedition::create([
            'vendor' => "SiCepat",
            'kota_tujuan' => "Jakarta",
            'fee' => 21500,
        ]);
    }
}
