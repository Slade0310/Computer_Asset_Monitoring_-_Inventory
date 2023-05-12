<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ComputerDesignation;
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
        // * SEEDERS *//
        $this->call(AdminSeeder::class);
        $this->call(AssetCategoriesSeeder::class);
        $this->call(ComputerDesignation::class);
    }
}
