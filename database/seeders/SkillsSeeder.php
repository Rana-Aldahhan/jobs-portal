<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create(['title'=>'java programming']);
        Skill::create(['title'=>'laravel framework']);
        Skill::create(['title'=>'Adobe premier']);
        Skill::create(['title'=>'Microsoft office']);
        Skill::create(['title'=>'Markiting']);
        Skill::create(['title'=>'adobe photoshop']);
        Skill::create(['title'=>'adobe illustrator']);
        Skill::create(['title'=>'React framework']);
        Skill::create(['title'=>'designing UI/UX']);
        Skill::create(['title'=>'Research']);
        Skill::create(['title'=>'Analytical skills']);
        Skill::create(['title'=>'Strategy']);
        Skill::create(['title'=>'problem solving']);
        Skill::create(['title'=>'communication']);
    }
}
