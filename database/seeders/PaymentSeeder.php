<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'metode' => 'Transfer BCA',
            'no_rek' => '123456789',
            'admin_fee' => 2000,
        ]);
        Payment::create([
            'metode' => 'Transfer BRI',
            'no_rek' => '123456789',
            'admin_fee' => 2000,
        ]);
        Payment::create([
            'metode' => 'Transfer BNI',
            'no_rek' => '123456789',
            'admin_fee' => 2000,
        ]);
    }
}
