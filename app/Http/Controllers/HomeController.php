<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import the User model

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        if ($user) {
            return view('home', compact('user')); // Pass user data to the view
        } else {
            return redirect()->route('login'); // Redirect to login if no user is authenticated
        }
    }

    // Update user role and redirect
    public function updateRoles(Request $request)   // Add this method to the HomeController
    {
        $request->validate([
            'role' => 'required|in:patient,doctor,admin',
        ]);
        $user = Auth::user(); // Ensure $user is an instance of the User model
        if (!$user instanceof User) {
            abort(500, 'Authenticated user is not a valid User instance.');
        }
        $user->role = $request->role;
        $user->save(); // Save the updated role to the database

        return redirect()->route("{$request->role}.dashboard")
            ->with('success', "Role updated to {$request->role}!");
    }
}
