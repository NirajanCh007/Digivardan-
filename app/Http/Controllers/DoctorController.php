<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function dashboard()
    {
        return view('doctor.dashboard');
    }
    public function appointmentspage(){
        return view('doctor.appoitments');
    }
}
