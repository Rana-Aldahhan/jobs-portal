<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    public function recievable()
    {
        return $this->morphTo();
    }
    public function sendable()
    {
        return $this->morphTo();
    }
}
