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

// Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// Authentication Routes
Auth::routes();

// Role update route
Route::post('/update-roles', [HomeController::class, 'updateRoles'])
    ->name('roles.update')
    ->middleware('auth');
// Role-Specific Dashboards
Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get(
        '/patient/dashboard',
        [PatientController::class, 'dashboard']
    )->name('patient.dashboard');
});

Route::middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/doctor/dashboard', [DoctorController::class, 'index'])->middleware('checkroles:doctor');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get(
        '/admin/dashboard',
        [AdminController::class, 'dashboard']
    )->name('admin.dashboard');
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
