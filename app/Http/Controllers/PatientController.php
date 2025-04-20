<?php

namespace App\Http\Controllers;

use App\Models\Doctor_availabilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointments;
class PatientController extends Controller
{
    public function dashboard()
    {
        return view('patient.dashboard');
    }
    public function doctorspage(){
        return view('patient.doctors');
    }
    public function appointmentspage(){
        $available = Doctor_availabilities::where('is_booked',false)->orderBy('created_at','ASC')->get();
        return view('patient.appointments',with(['availabilities'=>$available]));
    }
    public function bookAppointment(){

    }
    public function profile()
    {
        $user = Auth::user();
        $appointments = Appointments::where('patient_id', $user->id)->with('doctor')->get();
        return view('patient.profile', compact('appointments'));
    }

}
