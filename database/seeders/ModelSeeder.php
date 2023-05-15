<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarModel::create([
            'name' => 'E class',
            'make_id' => 1
        ]);

        CarModel::create([
            'name' => '5 Series',
            'make_id' => 2
        ]);
    }
}
