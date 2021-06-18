<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property int $industry_id
 * @property string $name
 * @property string $email
 * @property string|null $website_url
 * @property string $phone_number
 * @property int $employees_count
 * @property string $city
 * @property string $country
 * @property string|null $slogan
 * @property string|null $about
 * @property string|null $profile_thumbnail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[] $incomingMessages
 * @property-read int|null $incoming_messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Report[] $incomingReports
 * @property-read int|null $incoming_reports_count
 * @property-read \App\Models\Industry $industry
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $managingUsers
 * @property-read int|null $managing_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Notification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $notifiedUsers
 * @property-read int|null $notified_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[] $outcomingMessages
 * @property-read int|null $outcoming_messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Report[] $outcomingReports
 * @property-read int|null $outcoming_reports_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\JobOpportunity[] $publishedJobs
 * @property-read int|null $published_jobs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $userAcceptants
 * @property-read int|null $user_acceptants_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $userViewings
 * @property-read int|null $user_viewings_count
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmployeesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereIndustryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereProfileThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereSlogan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWebsiteUrl($value)
 * @mixin \Eloquent
 */
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
        return $this->morphMany(JobOpportunity  :: class,'publishable');
    }
    public function managingUsers()
    {
        return $this->hasMany(User  :: class);
    }
    public function notifications()
    {
        return $this->morphMany(Notification :: class,'notifiable');
    }
    public function notifiedUsers()
    {
        return $this->belongsToMany(User :: class,'user_notifying_company','company_id','user_id');
    }
    public function incomingReports()
    {
        return $this->morphMany(Report :: class,'receivable');
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
        return $this->morphMany(Message :: class,' receivable');
    }
    public function userViewings()
    {
        return $this->belongsToMany(User:: class,'company_user_views','viewing_id','viewer_id')->withTimestamps();
    }
    public function userAcceptants()
    {
        return $this->belongsToMany(User :: class ,'company_user_acceptants','acceptant_id','acceptor_id');
    }



}
