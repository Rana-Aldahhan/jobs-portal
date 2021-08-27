<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create(['name'=>'English']);
        Language::create(['name'=>'Arabic']);
        Language::create(['name'=>'French']);
        Language::create(['name'=>'Spanish']);
        Language::create(['name'=>'Chinese']);
        Language::create(['name'=>'German']);
    }
}
