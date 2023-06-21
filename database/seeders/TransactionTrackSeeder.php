<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\TransactionTrack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransactionTrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $n_transaction = Transaction::all()->count();

        for ($i = 1; $i <= $n_transaction; $i++) {
            $start_track = random_int(1, 3);

            for ($j = 1; $j <= $start_track; $j++) {
                $date = $faker->dateTimeBetween('-3 months', '-1 days');
                TransactionTrack::create([
                    'id_transaction' => $i,
                    'id_status_transaction' => $j,
                    'handle_at' => $date
                ]);
            }

            if ($start_track == 3) {
                $date = $faker->dateTimeBetween('-3 months', '-1 days');
                TransactionTrack::create([
                    'id_transaction' => $i,
                    'id_status_transaction' => random_int(4, 5),
                    'handle_at' => $date,
                ]);
            }
        }
    }
}
