<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\Request;
use App\Models\User;
class DoctorController extends Controller
{
    public function dashboard()
    {
        return view('doctor.dashboard');
    }
    public function appointmentspage() {
        $appointments = Appointments::orderBy('appointment_date', 'ASC')->get();
        return view('doctor.appointments', ['appointments' => $appointments]);
    }
    public function addApt() {
        $patients = User::where('role', 'patient')->get();
        return view('doctor.add-apt', ['patients' => $patients]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'status' => 'nullable|string',
        ]);
        $appointment = new Appointments();
        $appointment->patient_id = $request->patient_id;
        $appointment->doctor_id = auth()->user()->id;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->appointment_time = $request->appointment_time;
        $appointment->status = $request->status ?? 'pending';
        $appointment->save();
        return redirect()->route('doctor.appointments')->with('success', 'Appointment added successfully');
    }

}
