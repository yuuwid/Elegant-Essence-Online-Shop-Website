<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Admin::create([
            'full_name' => "Admin 1",
            'nip' => "123456",
            'password' => bcrypt('123456'),
            'nik' => '1234567890',
            'profile_photo' => 'images/root/no-image.png',
        ]);

    }
}
