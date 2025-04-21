<?php

namespace App\Http\Controllers;

use App\Models\Doctor_availabilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointments;
use Illuminate\Support\Facades\Validator;
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
        $available = Doctor_availabilities::where('is_booked','False')->orderBy('created_at','ASC')->get();
        return view('patient.appointments',with(['availabilities'=>$available]));
    }
    public function bookAppointment(Request $request){
        $validator =Validator::make($request->all(),[
            'availability_id'=>'required',
            'doctor_id'=>'required',
            'patient_id'=>'required',
            'date'=>'required',
            'time'=>'required'
        ]);
        if($validator->passes()){
            $booking = new Appointments();
            $booking->patient_id = Auth::user()->id;
            $booking->doctor_id = $request->doctor_id ;
            $booking->appointment_date = $request->date;
            $booking->appointment_time = $request->time;
            $booking->save();
            $av = new Doctor_availabilities();
            $av->is_booked = "True" ;
            $av->save();
            return redirect()->route('patient.checkappointments')->with('success','You have booked');
        }else {
            return redirect()->route('patient.checkappointments')->withErrors($validator);
        }
    }
    public function profile()
    {
        $user = Auth::user();
        $appointments = Appointments::where('patient_id', $user->id)->with('doctor')->get();
        return view('patient.profile', compact('appointments'));
    }

}
