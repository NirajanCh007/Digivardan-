<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'appointment_id',
        'doctor_id',
        'patient_id',
        'diagnosis',
        'medicines',
        'notes'
    ];
    protected $table = "prescription";
    public function appointment(){
        return $this->belongsTo(Appointments::class,'appointment_id');
    }
    public function doctor(){
        return $this->belongsTo(User::class,'doctor_id');
    }
    public function patient(){
        return $this->belongsTo(User::class,'patient_id');
    }
}
