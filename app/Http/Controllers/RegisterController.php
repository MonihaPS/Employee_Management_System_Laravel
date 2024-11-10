<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Assuming your User model is in App\Models namespace

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $request->all();

        // Assign a default role value based on the application logic
        $defaultRole = 'user'; // Default role for users

        // You can customize this logic based on your requirements
        if ($request->email === 'admin@example.com') {
            $defaultRole = 'admin'; // Default role for admin
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 0, // Default role for users,
        ]);

        // dd($user);

        if ($user->role === 1) {
            Auth::login($user); // Log in the admin user
            return redirect()->route('admin.dashboard')->with('status', 'Registered successfully as admin');
        } else {
            Auth::login($user); // Log in the regular user
            return redirect()->route('registration.success')->with('status', 'Registered successfully as user');
        }
        
    }

    public function userRegister()
    {
        return view('registration-success');
    }
}