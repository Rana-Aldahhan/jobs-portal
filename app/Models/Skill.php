<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Skill
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\JobOpportunity[] $jobsWithThatSkill
 * @property-read int|null $jobs_with_that_skill_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $usersWithThatSkill
 * @property-read int|null $users_with_that_skill_count
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

