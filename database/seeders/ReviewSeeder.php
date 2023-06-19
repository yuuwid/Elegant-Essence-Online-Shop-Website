<?php

namespace Database\Seeders;

use App\Models\DetailTransaction;
use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            $transaction = Transaction::where('id_user', $i)->get('id_transaction');

            foreach ($transaction as $tr) {
                $id_tr = $tr['id_transaction'];

                $products = DetailTransaction::where('id_transaction', $id_tr)
                    ->groupBy('id_product')
                    ->get('id_product');

                foreach ($products as $p) {
                    Review::create([
                        'title' => $faker->sentence(random_int(1, 2)),
                        'comment' => $faker->sentences(random_int(1, 3), true),
                        'rating' => random_int(3, 5),
                        'id_user' => $i,
                        'id_product' => $p['id_product']
                    ]);
                }
            }
        }
    }
}
