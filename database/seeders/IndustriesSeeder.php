<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Industry::create(['title'=>'software engineering']);
        Industry::create(['title'=>'commercial']);
        Industry::create(['title'=>'medicine']);
        Industry::create(['title'=>'architecture']);
        Industry::create(['title'=>'business']);
        Industry::create(['title'=>'services']);
    }
}
