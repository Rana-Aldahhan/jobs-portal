<?php

namespace Database\Seeders;

use App\Models\PositionType;
use Illuminate\Database\Seeder;

class PositionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PositionType::create(['name'=>'full time job']);
        PositionType::create(['name'=>'part time job']);
        PositionType::create(['name'=>'internship']);
    }
}
