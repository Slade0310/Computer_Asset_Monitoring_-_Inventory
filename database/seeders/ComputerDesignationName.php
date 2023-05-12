<?php

namespace Database\Seeders;

use App\Models\ComputerDesignation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComputerDesignationName extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $computerDesignationNames = [
            ['name' => 'PC#1'],
            ['name' => 'PC#2'],
            ['name' => 'PC#3'],
            ['name' => 'PC#4'],
            ['name' => 'PC#5'],
            ['name' => 'PC#6'],
            ['name' => 'PC#7'],
            ['name' => 'PC#8'],
            ['name' => 'PC#9'],
            ['name' => 'PC#10'],
        ];

        foreach ($computerDesignationNames as $computerDesignationName) {
            ComputerDesignation::create($computerDesignationName);
        }
    }
}
