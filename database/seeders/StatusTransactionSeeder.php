<?php

namespace Database\Seeders;

use App\Models\StatusTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        StatusTransaction::create([
            'status' => "Dibuat"
        ]);

        StatusTransaction::create([
            'status' => "Diproses"
        ]);

        StatusTransaction::create([
            'status' => "Dikirim"
        ]);

        StatusTransaction::create([
            'status' => "Ditolak"
        ]);

        StatusTransaction::create([
            'status' => "Selesai"
        ]);

    }
}
