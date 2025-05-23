<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Doctor_availabilities;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctors;
use Illuminate\Support\Facades\Validator;
use Auth;
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

    public function postfreetime(){
        return view('doctor.add-ft');
    }
    public function profilepage(){
        $doctor = Doctors::where('user_id', auth()->id())->first();
        $doctorInfoExists = $doctor !== null;
        return view('doctor.profile', compact('doctor', 'doctorInfoExists'));
    }
    public function storeDoctorInfo(Request $request)
    {
        $rules = [
            'specialization' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'qualification' => 'required|string|max:255',
            'clinic_name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('doctor.profile')->withInput()->withErrors($validator);
        }
        // Create new doctor instance
        $doctor = new Doctors();
        $doctor->user_id = Auth::user()->id;
        $doctor->specialization = $request->specialization;
        $doctor->experience = $request->experience;
        $doctor->qualification = $request->qualification;
        $doctor->clinic_name = $request->clinic_name;
        $doctor->location = $request->location;
        $doctor->bio = $request->bio;
        $doctor->phone = $request->phone;
        $doctor->save();
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/doctors'), $imageName);
            $doctor->profile_image = $imageName;
            $doctor->save();
        }
        return redirect()->route('doctor.profile')->with('success', 'Doctor has been added successfully.');
    }

    public function storefreetime(Request $request){
        $validator = Validator::make($request->all(),[
            'available_date'=>'required|date',
            'available_time'=>'required'
        ]);
        if($validator->passes()){
            $freetime = new Doctor_availabilities();
            $freetime->doctor_id = Auth::user()->id;
            $freetime->available_date = $request->available_date;
            $freetime->available_time = $request->available_time;
            $freetime->is_booked = false;
            $freetime->save();
            return redirect()->route('doctor.addfreetime')->with('success','Now patients can see your free time');
        }else{
            return redirect()->route('doctor.addfreetime')->withErrors($validator);
        }
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
    public function updateDoctorInfo(Request $request){
        $rules = [
            'specialization' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
            'qualification' => 'required|string|max:255',
            'clinic_name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            \Log::error('Update validation failed:', $validator->errors()->toArray());
            return redirect()->route('doctor.profile')->withInput()->withErrors($validator);
        }

        try {
            $doctor = Doctors::where('user_id', Auth::user()->id)->first();

            if (!$doctor) {
                \Log::error('Doctor profile not found for update:', ['user_id' => Auth::user()->id]);
                return redirect()->route('doctor.profile')->with('error', 'Profile not found. Please create a profile first.');
            }

            // Update basic info
            $doctor->specialization = $request->specialization;
            $doctor->experience = $request->experience;
            $doctor->qualification = $request->qualification;
            $doctor->clinic_name = $request->clinic_name;
            $doctor->location = $request->location;
            $doctor->bio = $request->bio;
            $doctor->phone = $request->phone;

            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                // Create directory if it doesn't exist
                $path = public_path('uploads/doctors');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                // Delete old image if exists
                if ($doctor->profile_image && file_exists($path . '/' . $doctor->profile_image)) {
                    unlink($path . '/' . $doctor->profile_image);
                }

                // Move and save new image
                $image->move($path, $imageName);
                $doctor->profile_image = $imageName;
            }

            $doctor->save();
            \Log::info('Doctor profile updated:', ['doctor_id' => $doctor->id]);
            return redirect()->route('doctor.profile')->with('success', 'Profile has been updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Error updating doctor profile:', ['error' => $e->getMessage()]);
            return redirect()->route('doctor.profile')->with('error', 'An error occurred while updating your profile.');
        }
    }

}
