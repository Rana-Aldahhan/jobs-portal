<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public function employees()
    {
        return $this -> hasMany(User :: class);
    }
    public function industry()
    {
        return $this->belongsTo(Industry :: class);
    }
    public function publishedJobs()
    {
        return $this->morphMany(JobOpportuniity  :: class,'publishable');
    }
    public function managingUsers()
    {
        return $this->hasMany(User  :: class);
    }
    public function notifications()
    {
        return $this->morphMany(Notification :: class,'notifable');
    }
    public function incomingReports()
    {
        return $this->morphMany(Report :: class,'recievable');
    }
    public function outcomingReports()
    {
        return $this->morphMany(Report :: class,'sendable');
    }
    public function outcomingMessages()
    {
        return $this->morphMany(Message :: class,'sendable');
    }
    public function incomingMessages()
    {
        return $this->morphMany(Message :: class,' recievable');
    }
    public function userViewings()
    {
        return $this->belongsToMany(User:: class,'company_user_views','viewing_id','viewer_id');
    }
    
   

}
