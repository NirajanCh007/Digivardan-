<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Views;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;

// Authentication Routes
Auth::routes();

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Register Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// Authentication Routes
Auth::routes();

// Role update route
Route::post('/update-roles', [HomeController::class, 'updateRoles'])
    ->name('roles.update')
    ->middleware('auth');
// Role-Specific Dashboards
Route::middleware(['auth', 'checkroles:patient'])->group(function () {
    Route::get('/patient/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');
    Route::get('/patient/doctors',[PatientController::class,'doctorspage'])->name('patient.doctors');
    Route::get('/patient/appointments',[PatientController::class,'appointmentspage'])->name('patient.checkappointments');
    Route::get('/patient/profile',[PatientController::class,'profile'])->name('patient.profile');
    Route::get('/patient/logout',[LoginController::class,'logout'])->name('patient.logout');
});

Route::middleware(['auth', 'checkroles:doctor'])->group(function () {
    Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
    Route::get('/doctor/appointments',[DoctorController::class,'appointmentspage'])->name('doctor.appointments');
    Route::get('/doctor/logout',[LoginController::class,'logout'])->name('doctor.logout');
    Route::get('/doctor/addappointmentpage',[DoctorController::class,'addApt'])->name('doctor.addApt');
    Route::post('/doctor/storeapt',[DoctorController::class,'store'])->name('doctor.storeapt');
    Route::get('/doctor/addfreetime',[DoctorController::class,'postfreetime'])->name('doctor.addfreetime');
    Route::post('/doctor/postfreetime',[DoctorController::class,'storefreetime'])->name('doctor.storefreetime');
    Route::get('/doctor/profile', [DoctorController::class, 'profilepage'])->name('doctor.profile');
    Route::post('/doctor/profileinfo', [DoctorController::class, 'storeDoctorInfo'])->name('doctor.storeinfo');
    Route::put('/doctor/profileinfo', [DoctorController::class, 'updateDoctorInfo'])->name('doctor.updateinfo');
});

Route::middleware(['auth', 'checkroles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Home Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/home',
    [LoginController::class, 'redirectToRoleDashboard']
)->name('home')->middleware('auth');











// Route::get('/home', function () {
//     return view('home');
// })->middleware('auth')->name('home');
