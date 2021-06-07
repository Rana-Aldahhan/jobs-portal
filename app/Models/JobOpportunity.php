<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOpportunity extends Model
{
    use HasFactory;
    public function industry()//moph later
    {
        return $this->belongsTo(Industry:: class,'industry_job','job_id','industry_id');
    }
    public function typeOfPosition()
    {
        return $this->belongsTo(PositionType :: class);
    }
    public function requiredSkills()//morph later
    {
        return $this->belongsToMany(Skill :: class,'job_skill','job_id','skill_id');
    }
    public function incomingReports()
    {
        return $this->morphMany(Report :: class,'recievable');
    }
    public function applicants()
    {
        return $this->belongsToMany(User :: class,'applications','job_id','user_id')->withPivot('approved');;
    }
    public function publishable()
    {
        return $this->morphTo();
    }
    public function userViewers()
    {
        return $this->belongsToMany(User:: class,'user_job_views','viewing_id','viewer_id');
    }

}
