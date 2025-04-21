<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor_availabilities extends Model
{
    protected $fillable=['doctor_id','available_date','available_time','is_booked'];
    protected $table = 'doctor_availabilities';
    public function doctor(){
        return $this->belongsTo(User::class);
    }
}
