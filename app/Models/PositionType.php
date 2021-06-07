<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionType extends Model
{
    use HasFactory;
    public function jobs()
    {
        return $this->hasMany(JobOppotunity :: class );
    }
}
