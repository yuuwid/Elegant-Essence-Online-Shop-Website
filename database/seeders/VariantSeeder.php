<?php

namespace Database\Seeders;

use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i <= 50; $i++) {
            $price = random_int(30000, 1000000);
            $n_variant = random_int(1, 5);

            for ($j = 0; $j < $n_variant; $j++) {
                Variant::create([
                    'id_product' => $i,
                    'price' => $price,
                    'discount' => random_int(0, 10),
                    'stock' => random_int(1, 1000),
                    'id_size' => random_int(1, 12),
                    'id_color' => random_int(1, 5),
                ]);
            }
        }
    }
}
