<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\TransactionTrack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionTrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n_transaction = Transaction::all()->count();

        for ($i = 1; $i <= $n_transaction; $i++) {
            $start_track = random_int(1, 3);

            for ($j = 1; $j <= $start_track; $j++) {
                TransactionTrack::create([
                    'id_transaction' => $i,
                    'id_status_transaction' => $j,
                ]);
            }

            if ($start_track == 3) {
                TransactionTrack::create([
                    'id_transaction' => $i,
                    'id_status_transaction' => random_int(4, 5),
                ]);
            }
        }
    }
}
