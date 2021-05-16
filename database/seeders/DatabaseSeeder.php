<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Partner;
use App\Models\Product;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create();
        Product::factory(10)->create();
        Brand::factory(10)->create();
        Partner::factory(10)->create();
    }
}
