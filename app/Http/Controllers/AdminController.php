<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $apt = Appointments::orderBy('created_at','ASC')->get();
        return view('admin.dashboard',['appointments'=>$apt]);
    }
}
