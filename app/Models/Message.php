<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    public function sendable()
    {
        return $this->morphTo();
    }
    public function recievable()
    {
        return $this->morphTo();
    }
}
