<?php

namespace Database\Seeders;

use App\Models\DetailTransaction;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n_transaction = Transaction::all()->count();
        $n_product = Product::all()->count();

        for ($i = 1; $i < $n_transaction; $i++) {
            $n_buy = random_int(2, 10);

            for ($j = 1; $j <= $n_buy; $j++) {
                $id_product = Product::where('id_product', random_int(1, $n_product))
                    ->get('id_product')->first()['id_product'];

                $variant = Variant::where('id_product', $id_product)->get('id_variant');

                foreach ($variant as $v) {
                    DetailTransaction::create([
                        'id_product' => $id_product,
                        'id_transaction' => $i,
                        'id_variant' => $v['id_variant'],
                        'qty' => random_int(1, 5),
                    ]);
                }

            }
        }
    }
}
