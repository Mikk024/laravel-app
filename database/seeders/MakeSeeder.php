<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Make;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Make::create([
            'name' => 'Mercedes-Benz'
        ]);

        Make::create([
            'name' => 'BMW'
        ]);
    }
}
