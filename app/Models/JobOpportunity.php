<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\JobOpportunity
 *
 * @property int $id
 * @property int|null $industry_id
 * @property int|null $publishable_id
 * @property string|null $publishable_type
 * @property int $expired
 * @property int|null $positionType_id
 * @property string $title
 * @property string $description
 * @property int $remote
 * @property int|null $transportation
 * @property int $salary
 * @property string|null $city
 * @property string|null $country
 * @property string $role
 * @property int $required_experience
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $applicants
 * @property-read int|null $applicants_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Report[] $incomingReports
 * @property-read int|null $incoming_reports_count
 * @property-read \App\Models\Industry|null $industry
 * @property-read Model|\Eloquent $publishable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Skill[] $requiredSkills
 * @property-read int|null $required_skills_count
 * @property-read \App\Models\PositionType|null $typeOfPosition
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $userViewers
 * @property-read int|null $user_viewers_count
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity whereExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity whereIndustryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity wherePositionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity wherePublishableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity wherePublishableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity whereRemote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity whereRequiredExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity whereTransportation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOpportunity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class JobOpportunity extends Model
{
    use HasFactory;
    public function industry()//morph later
    {
        return $this->belongsTo(Industry:: class);//'job_id','industry_id');
    }
    public function typeOfPosition()
    {
        return $this->belongsTo(PositionType :: class,'positionType_id',);
    }
    public function requiredSkills()//morph later
    {
        return $this->belongsToMany(Skill :: class,'job_skill','job_id','skill_id');
    }
    public function incomingReports()
    {
        return $this->morphMany(Report :: class,'receivable');
    }
    public function applicants()
    {
        return $this->belongsToMany(User :: class,'applications','job_id','user_id')->withPivot('approved');
    }
    public function publishable()
    {
        return $this->morphTo();
    }
    public function userViewers()
    {
        return $this->belongsToMany(User:: class,'user_job_views','viewer_id','viewing_id')->withTimestamps();
    }

}
