<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property int|null $current_company_id
 * @property int|null $school_id
 * @property int|null $managing_company_id
 * @property int|null $industry_id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $birth_date
 * @property string|null $phone_number
 * @property string|null $city
 * @property string|null $country
 * @property string|null $about
 * @property int|null $looking_for_job
 * @property int $admin
 * @property int|null $years_of_experience
 * @property string|null $role
 * @property string|null $current_job_title
 * @property string|null $current_company_name
 * @property int $logged_as_company
 * @property string|null $profile_thumbnail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\JobOpportunity[] $appliedJobs
 * @property-read int|null $applied_jobs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $companyAcceptors
 * @property-read int|null $company_acceptors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $companyViewers
 * @property-read int|null $company_viewers_count
 * @property-read \App\Models\Company|null $currentCompany
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Report[] $incomingReports
 * @property-read int|null $incoming_reports_count
 * @property-read \App\Models\Industry|null $industry
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $jobViewings
 * @property-read int|null $job_viewings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Language[] $languages
 * @property-read int|null $languages_count
 * @property-read \App\Models\Company|null $managingCompany
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Notification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Company[] $notifyingCompanies
 * @property-read int|null $notifying_companies_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Report[] $outcomingReports
 * @property-read int|null $outcoming_reports_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\JobOpportunity[] $publishedJobs
 * @property-read int|null $published_jobs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $receivedColleagues
 * @property-read int|null $received_colleagues_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[] $receivedMessages
 * @property-read int|null $received_messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\JobOpportunity[] $savedJobs
 * @property-read int|null $saved_jobs_count
 * @property-read \App\Models\School|null $school
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $sentColleagues
 * @property-read int|null $sent_colleagues_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[] $sentMessages
 * @property-read int|null $sent_messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Skill[] $skills
 * @property-read int|null $skills_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $userAcceptants
 * @property-read int|null $user_acceptants_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $userAcceptors
 * @property-read int|null $user_acceptors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $userViewers
 * @property-read int|null $user_viewers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $userViewings
 * @property-read int|null $user_viewings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WorkPlace[] $workPlaces
 * @property-read int|null $work_places_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIndustryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoggedAsCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLookingForJob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereManagingCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfileThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSchoolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereYearsOfExperience($value)
 * @mixin \Eloquent
 */
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
        return $this->belongsTo(Company :: class,'current_company_id');
    }
    public function sentColleagues()//user1 is sender , user2 is receiver
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
        return $this->belongsToMany( WorkPlace:: class,'user_workplace','user_id','workplace_id')->withPivot(['started_at','ended_at','user_job_title']);
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
        return $this->belongsToMany(User:: class,'user_user_views','viewer_id','viewing_id' )->withTimestamps();
    }
    public function companyViewers()
    {
        return $this->belongsToMany(Company:: class,'company_user_views','viewer_id' ,'viewing_id')->withTimestamps();
    }
    public function userViewings()
    {
        return $this->belongsToMany(User:: class,'user_user_views','viewing_id','viewer_id')->withTimestamps();
    }
    public function jobViewings()
    {
        return $this->belongsToMany(JobOpportunity:: class,'user_job_views','viewing_id','viewer_id')->withTimestamps();
    }
    public function userAcceptants()
    {
        return $this->belongsToMany(User :: class ,'user_user_acceptants','acceptor_id','acceptant_id')->withTimestamps();
    }
    public function userAcceptors()
    {
        return $this->belongsToMany(User :: class ,'user_user_acceptants','acceptant_id','acceptor_id');
    }
    public function companyAcceptors()
    {
        return $this->belongsToMany(Company :: class ,'company_user_acceptants','acceptant_id','acceptor_id');
    }





}
