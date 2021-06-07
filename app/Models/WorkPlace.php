<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkPlace extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsToMany(User :: class ,'workplace_id','user_workplace');
    }
}
