<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    protected $fillable=[
        'user_id',
        'specialization',
        'experience',
        'qualification',
        'clinic_name',
        'location',
        'bio',
        'phone',
        'profile_image'
    ];
    protected $table = 'doctors';
}
