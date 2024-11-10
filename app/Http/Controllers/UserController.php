<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userDashboard()
    {
        return view('user.dashboard');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 2, // Default role for user
        ]);

        Auth::login($user);

        return redirect()->route('registration.success')->with('status', 'Registration successful!');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
              // Fetch the user based on email address
        $user = User::where('email', $request->email)->first();
        if($user->role==1)
        {
           return redirect()->route('admin.dashboard')->with('status', 'Logged in successfully as Admin');
        }
        else
           return redirect()->route('user.dashboard')->with('status', 'Logged in successfully as User');
        }
        else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
      


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if (Auth::user()->role == 1) {
                return redirect()->route('admin.dashboard')->with('status', 'Logged in successfully as Admin');
            } else {
                return redirect()->route('user.dashboard')->with('status', 'Logged in successfully as User');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showEditProfileForm()
    {
        return view('user.edit-profile', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        //$user->save();

        if ($user->role == 1) {
            return redirect()->route('admin.dashboard')->with('status', 'Profile updated successfully!');
        } else {
            return redirect()->route('user.dashboard')->with('status', 'Profile updated successfully!');
        }
    }

    public function dashboard()
    {
        $user = Auth::user();
        if ($user->role == 1) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('user.dashboard', compact('user'));
        }
    }
    
    public function index(Request $request)
    {
        $user=Auth::user();
        $user_lists = User::whereIn('role', ['1', '2'])->get()->toArray();
        // $user_lists = User::where('role','=',2)->get()->toArray();
        return view('admin.dashboard', compact('user','user_lists'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('status', 'Logged out successfully');
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $managers = User::whereIn('role', ['1', '2', '3', '4', '5'])->get(); // Add role IDs for different managers here
        return view('admin.edit_user', compact('user', 'managers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:1,2',
            'designation' => 'required|string|max:255',
            'reporting_manager' => 'required|exists:users,id',
        ]);
        // $user = User::findOrFail($id);
        $affected = DB::table('users')
                ->where('id', $id)
                ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
                'designation' => $request->input('designation'),
                'reporting_manager' => $request->input('reporting_manager'),
                ]);
        
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->role = '1'; // Assuming 'Admin' is the role you want to set
        // $user->designation = $request->input('designation');
        // $user->reporting_manager = $request->input('reporting_manager');
        // $user->save();
        return redirect()->route('admin.users.index')->with('status', 'User updated successfully');
    }

    public function showLeaveReport()
    {
    $leaves = Leave::with('user')->get(); // Fetch all leave records with associated user data
    return view('admin.leave_report', compact('leaves'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('status', 'User deleted successfully');
    }
}
