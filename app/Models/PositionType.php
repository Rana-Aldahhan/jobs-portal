<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PositionType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\JobOpportunity[] $jobs
 * @property-read int|null $jobs_count
 * @method static \Illuminate\Database\Eloquent\Builder|PositionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PositionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PositionType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PositionType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PositionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PositionType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PositionType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PositionType extends Model
{
    use HasFactory;
    public function jobs()
    {
        return $this->hasMany(JobOpportunity :: class );
    }
}
