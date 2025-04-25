<?php

use App\Http\Controllers\MessageController;
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
Route::group(['prefix'=>'patient'],function(){
    Route::middleware(['auth', 'checkroles:patient'])->group(function () {
        Route::get('dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');
        Route::get('appointments',[PatientController::class,'appointmentspage'])->name('patient.checkappointments');
        Route::get('profile',[PatientController::class,'profile'])->name('patient.profile');
        Route::get('logout',[LoginController::class,'logout'])->name('patient.logout');
        Route::post('book',[PatientController::class,'bookAppointment'])->name('patient.book');
        Route::get('notifications', [PatientController::class, 'notifications'])->name('patient.notifications');
        Route::put('notifications/{id}/mark-read', [PatientController::class, 'markNotification'])->name('patient.markNotification');
        Route::put('notifications/mark-all', [PatientController::class, 'markAllNotifications'])->name('patient.markAllNotifications');
        Route::get('prescriptions/{id}',[PatientController::class,'showPrescription'])->name('patient.checkprescription');
        Route::get('chat/{receiver}',[MessageController::class,'index'])->name('patient.messages');
        Route::get('messages/{receiver}',[MessageController::class,'fetch'])->name('patient.mm');
        Route::post('send/{receiver}',[MessageController::class,'send'])->name('patient.sendMessage');
    });
    });

Route::group(['prefix'=>'doctor'],function(){
    Route::middleware(['auth', 'checkroles:doctor'])->group(function () {
        Route::get('dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
        Route::get('appointments',[DoctorController::class,'appointmentspage'])->name('doctor.appointments');
        Route::get('logout',[LoginController::class,'logout'])->name('doctor.logout');
        Route::get('addappointmentpage',[DoctorController::class,'addApt'])->name('doctor.addApt');
        Route::post('storeapt',[DoctorController::class,'store'])->name('doctor.storeapt');
        Route::get('addfreetime',[DoctorController::class,'postfreetime'])->name('doctor.addfreetime');
        Route::post('postfreetime',[DoctorController::class,'storefreetime'])->name('doctor.storefreetime');
        Route::get('profile', [DoctorController::class, 'profilepage'])->name('doctor.profile');
        Route::post('profileinfo', [DoctorController::class, 'storeDoctorInfo'])->name('doctor.storeinfo');
        Route::put('profileinfo', [DoctorController::class, 'updateDoctorInfo'])->name('doctor.updateinfo');
        Route::get('notifications', [DoctorController::class, 'notifications'])->name('doctor.notifications');
        Route::put('notifications/{id}/mark-read', [DoctorController::class, 'markNotification'])->name('doctor.markNotification');
        Route::put('notifications/mark-all', [DoctorController::class, 'markAllNotifications'])->name('doctor.markAllNotifications');
        Route::get('acceptAppointment/{id}',[DoctorController::class,'acceptAppointment'])->name('doctor.acceptappointment');
        Route::get('cancelaAPT',[DoctorController::class,'cancelAppointment'])->name('doctor.cancelAPT');
        Route::post('prescribe/{id}',[DoctorController::class,'appointmentComplete'])->name('doctor.appointmentcomplete');
        Route::get('/patientProfile/{id}',[DoctorController::class,'patientProfile'])->name('doctor.patientProfile');
        Route::get('chat/{receiver}',[MessageController::class,'index'])->name('doctor.message');
        Route::get('messages/{receiver}',[MessageController::class,'fetch'])->name('doctor.mm');
        Route::post('send/{receiver}',[MessageController::class,'send'])->name('doctor.sendMessage');

    });
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
