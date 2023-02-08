<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function doctor() {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }

    public function patient() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
