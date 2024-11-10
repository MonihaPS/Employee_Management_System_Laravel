<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function showUserLeaveForm()
    {
        $reportingManagers = User::where('role', '!=', 2)->pluck('name', 'id');
        return view('user.leave_form', compact('reportingManagers'));
    }

    public function showAdminLeaveForm()
    {
        $reportingManagers = User::where('role', '!=', 2)->pluck('name', 'id');
        return view('admin.leave_form', compact('reportingManagers'));
    }
    
    public function apply(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'role' => 'required|in:admin,user',
            'reason' => 'required|string|max:255',
        ]);

        Leave::create([
            'user_id' => Auth::id(),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'role' => $request->input('role'),
            'reason' => $request->input('reason'),
            'status' => 0, // Assuming 0 is for pending status 77
        ]);

        return redirect()->back()->with('status', 'Leave application submitted successfully.');
    }

    public function countWeekdays($startDate, $endDate)
    {
        // Array of weekdays
        $weekdays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];

        $start = strtotime($startDate);
        $end = strtotime($endDate);

        // Swap dates if start date is after end date
        if ($start > $end) {
            list($start, $end) = array($end, $start);
        }

        $weekdayCount = 0;
        $currentDate = $start;

        while ($currentDate <= $end) {
            $dayOfWeek = date('D', $currentDate);

            // Check if the current day is a weekday (Mon to Fri)
            if (in_array($dayOfWeek, $weekdays)) {
                $weekdayCount++;
            }

            $currentDate = strtotime('+1 day', $currentDate);
        }

        return $weekdayCount;
    }

    public function userLeaveReport()
    {
        $leaves = Leave::with('user')->where('user_id', Auth::id())->get();
        $totalLeaveDays = $leaves->sum('leave_days');
        
        return view('user.leave_report', compact('leaves', 'totalLeaveDays'));
    }

    public function showLeaveApplications()
    {
        // Get leave applications where the reporting_manager_id matches the current manager's ID
        $leaves = Leave::select('leaves.id', 'users.name', 'leaves.start_date', 'leaves.end_date', 'leaves.role', 'leaves.reason', 'leaves.status')
                       ->leftJoin('users', 'leaves.user_id', '=', 'users.id')
                       ->where('users.reporting_manager', Auth::id())
                       ->get();

        return view('leave_applications', compact('leaves'));
    }

    public function updateLeaveStatus(Request $request, $id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = $request->input('status');
        $leave->save();

        return redirect()->back()->with('status', 'Leave status updated successfully.');
    }
}
