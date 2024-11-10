<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function userAttendance()
    {
        $userId = Auth::user()->id;
        $attendances = Attendance::where('user_id', $userId)->orderBy('date')->get();
        return view('user.attendance', compact('attendances'));
    }

    public function checkIn()
    {
        $userId = Auth::user()->id;
        $currentDate = Carbon::now()->toDateString();
        $currentTime = Carbon::now()->toTimeString();

        // Check if user already has an attendance record for today
        $attendance = Attendance::where('user_id', $userId)
            ->where('date', $currentDate)
            ->first();

        if ($attendance) {
            return redirect()->back()->with('error', 'You have already checked in today.');
        }

        // Create new attendance record
        Attendance::create([
            'user_id' => $userId,
            'date' => $currentDate,
            'status' => 'present',
            'check_in' => $currentTime,
            'check_out' => $currentTime, // Set check_out to check_in time initially
        ]);

        return redirect()->back()->with('success', 'Checked in successfully.');
    }

    public function checkOut()
    {
        $userId = Auth::user()->id;
        $currentDate = Carbon::now()->toDateString();
        $currentTime = Carbon::now()->toTimeString();

        // Find the user's attendance record for today
        $attendance = Attendance::where('user_id', $userId)
            ->where('date', $currentDate)
            ->first();

        if (!$attendance) {
            return redirect()->back()->with('error', 'You have not checked in today.');
        }

        // Update check_out time
        $attendance->update([
            'check_out' => $currentTime,
        ]);

        return redirect()->back()->with('success', 'Checked out successfully.');
    }
}