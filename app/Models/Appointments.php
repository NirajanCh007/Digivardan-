<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable=[
        'patient_id',
        'doctor_id',
        'appointment_date',
        'appointment_time',
        'status',
        'notes'
    ];


    public function patient() {
        return $this->belongsTo(User::class, 'patient_id');
    }

}
