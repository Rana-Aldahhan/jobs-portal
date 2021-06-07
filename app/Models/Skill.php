<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    public function usersWithThatSkill()
    {
        return $this->belongsToMany(User :: class,'skill_user','skill_id','user_id');
    }
    public function jobsWithThatSkill()
    {
        return $this->belongsToMany(JobOpportunity :: class,'job_skill','skill_id','job_id');
    }
 
}

