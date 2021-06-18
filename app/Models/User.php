<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function currentCompany()
    {
        return $this->belongsTo(Company :: class);
    }
    public function sentColleagues()
    {
        return $this->belongsToMany(User :: class,'colleagues','user1_id','user2_id')->withPivot('approved');
    }
    public function receivedColleagues()
    {
        return $this->belongsToMany(User :: class,'colleagues','user2_id','user1_id')->withPivot('approved');
    }
    public function industry()
    {
        return $this->belongsTo(Industry :: class);
    }
    public function skills()
    {
        return $this->belongsToMany(Skill:: class,'skill_user','user_id','skill_id');
    }
    public function sentMessages()
    {
        return $this->morphMany(Message :: class,'sendable');
    }
    public function receivedMessages()
    {
        return $this->morphMany(Message :: class,'receivable');
    }

    public function school()
    {
        return $this->belongsTo(School :: class);
    }
    public function workPlaces()
    {
        return $this->belongsToMany( WorkPlace:: class,'user_workplace','user_id','workplace_id');
    }
    public function languages()
    {
        return $this->belongsToMany(Language :: class,'language_user','user_id','language_id');
    }
    public function managingCompany()
    {
        return $this->belongsTo(Company :: class);
    }
    public function savedJobs()
    {
        return $this->belongsToMany(JobOpportunity :: class,'saved_jobs','user_id','job_id');
    }
    public function notifyingCompanies()
    {
        return $this->belongsToMany(Company :: class,'user_notifying_company','user_id','company_id');
    }
    public function publishedJobs()
    {
        return $this->morphMany(JobOpportunity  :: class,'publishable');
    }
    public function appliedJobs()
    {
        return $this->belongsToMany(JobOpportunity  :: class,'applications','user_id','job_id')->withPivot('approved');
    }
    public function incomingReports()
    {
        return $this->morphMany(Report :: class,'receivable');
    }
    public function outcomingReports()
    {
        return $this->morphMany(Report :: class,'sendable');
    }
    public function notifications()
    {
        return $this->morphMany(Notification :: class,'notifiable');
    }
    public function userViewers()
    {
        return $this->belongsToMany(User:: class,'user_user_views','viewing_id','viewer_id' )->withTimestamps();
    }
    public function companyViewers()
    {
        return $this->belongsToMany(User:: class,'company_user_views','viewing_id','viewer_id' )->withTimestamps();
    }
    public function userViewings()
    {
        return $this->belongsToMany(User:: class,'user_user_views','viewer_id','viewing_id')->withTimestamps();
    }
    public function jobViewings()
    {
        return $this->belongsToMany(User:: class,'user_job_views','viewer_id','viewing_id')->withTimestamps();
    }
    public function userAcceptants()
    {
        return $this->belongsToMany(User :: class ,'user_user_acceptants','acceptant_id','acceptor_id')->withTimestamps();
    }
    public function userAcceptors()
    {
        return $this->belongsToMany(User :: class ,'user_user_acceptants','acceptor_id','acceptant_id');
    }
    public function companyAcceptors()
    {
        return $this->belongsToMany(User :: class ,'company_user_acceptants','acceptor_id','acceptant_id');
    }





}
