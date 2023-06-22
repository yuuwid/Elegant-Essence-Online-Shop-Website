<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i <= 50; $i++) {
            $n_img = random_int(1, 4);
            $thumbnail = random_int(1, 4);

            for ($j = 1; $j <= $n_img; $j++) {
                Image::create([
                    'id_product' => $i,
                    'thumnbail' => ($j == $thumbnail) ? 1 : 0,
                ]);
            }
        }
    }
}
