<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WorkPlace
 *
 * @property int $id
 * @property string $company_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|WorkPlace newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkPlace newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkPlace query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkPlace whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkPlace whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkPlace whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkPlace whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WorkPlace extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsToMany(User :: class ,'workplace_id','user_workplace');
    }
}
