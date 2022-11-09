<?php

namespace Database\Seeders;

use App\Models\AssetCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assetCategories = [
            ['name' => 'System Unit'],
            ['name' => 'Headset'],
            ['name' => 'Webcam'],
            ['name' => 'Monitor'],
            ['name' => 'Mouse'],
            ['name' => 'Keyboard'],
        ];

        foreach ($assetCategories as $assetCategory) {
            AssetCategory::create($assetCategory);
        }
    }
}
