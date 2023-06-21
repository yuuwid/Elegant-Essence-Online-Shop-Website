<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Color;
use App\Models\DetailTransaction;
use App\Models\Size;
use App\Models\StatusTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            AdminSeeder::class,
            BrandCategorySeeder::class,
            ColorSizeSeeder::class,
            PaymentSeeder::class,
            StatusTransactionSeeder::class,
            ExpeditionSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            AddressSeeder::class,
            VariantSeeder::class,
            DeliverySeeder::class,
            TransactionSeeder::class,
            TransactionTrackSeeder::class,
            DetailTransactionSeeder::class,
            ReviewSeeder::class,
            ImageSeeder::class
        ]);
    }
}
