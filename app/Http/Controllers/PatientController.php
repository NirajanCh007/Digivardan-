<?php

namespace App\Http\Controllers;

use App\Models\Doctor_availabilities;
use App\Models\Prescription;
use App\Notifications\AppointmentBooked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointments;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class PatientController extends Controller
{
    public function dashboard()
    {
        $Appointments = Appointments::where('patient_id',Auth::id())->orderBy('created_at','ASC')->take(3)->get();

        return view('patient.dashboard',['appointments'=>$Appointments]);
    }
    public function appointmentspage(){
        $available = Doctor_availabilities::with('doctor')->where('is_booked','False')->orderBy('created_at','ASC')->get();
        return view('patient.appointments',with(['slots'=>$available]));
    }
    public function bookAppointment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'availability_id' => 'required|exists:doctor_availabilities,id',
            'doctor_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'time' => 'required'
        ]);
        if ($validator->passes()) {
            $booking = new Appointments();
            $booking->patient_id = Auth::id();
            $booking->doctor_id = $request->doctor_id;
            $booking->appointment_date = $request->date;
            $booking->appointment_time = $request->time;
            $booking->notes = $request->notes;
            $booking->save();
            $availability = Doctor_availabilities::find($request->availability_id);
            if ($availability) {
                $availability->is_booked = true;
                $availability->save();
            }
            $doctor = User::find($request->doctor_id);
            $doctor->notify(new AppointmentBooked($booking));
            Auth::user()->notify(new AppointmentBooked($booking));
            return redirect()->route('patient.checkappointments')->with('success', 'Appointment booked successfully!');
        } else {
            return redirect()->route('patient.checkappointments')->withErrors($validator)->withInput();
        }
    }
    public function notifications() {
        $notifications = auth()->user()->notifications;
        return view('patient.notifications', compact('notifications'));
    }
    public function markNotification($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        return redirect()->back()->with('success', 'Notification marked as read.');
    }
    public function markAllNotifications()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return back()->with('success', 'All notifications marked as read.');
    }

    public function showPrescription($id){
        $prescription = Prescription::with(['appointment','doctor','patient'])->findOrFail($id);
        return view('patient.prescription',compact('prescription'));
    }
    public function profile()
    {
        $user = Auth::user();
        $appointments = Appointments::where('patient_id', $user->id)->with('doctor')->get();
        return view('patient.profile', compact('appointments'));
    }

}
