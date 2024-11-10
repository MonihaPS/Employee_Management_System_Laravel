<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AttendanceController;

// Home page route
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/test_33', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
// Registration success route
Route::get('/registration-success', [RegisterController::class, 'userRegister'])->name('registration.success');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard');
    Route::get('/user/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('/user/profile', [UserController::class, 'showEditProfileForm'])->name('user.profile.edit');
    Route::post('/user/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');

    // User routes
    Route::get('/user/leave-form', [LeaveController::class, 'showUserLeaveForm'])->name('user.leave.form');
    Route::post('/user/leave/apply', [LeaveController::class, 'apply'])->name('user.leave.apply');
    Route::get('/user/leave-report', [LeaveController::class, 'userLeaveReport'])->name('user.leave.report');

    // Admin routes
    Route::get('/admin/leave-report', [LeaveController::class, 'showLeaveReport'])->name('admin.leave.report');
    Route::get('/admin/leave-form', [LeaveController::class, 'showAdminLeaveForm'])->name('admin.leave.form');
    Route::post('/admin/leave/apply', [LeaveController::class, 'apply'])->name('admin.leave.apply');
    Route::get('/leave-applications', [LeaveController::class, 'showLeaveApplications'])->name('leave.applications');
    Route::patch('/leave-applications/{id}/status', [LeaveController::class, 'updateLeaveStatus'])->name('update.leave.status');
    
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/leave-report', [UserController::class, 'showLeaveReport'])->name('leave.report');
    });
    Route::get('/user/attendance', [AttendanceController::class, 'userAttendance'])->name('user.attendance');
    Route::post('/user/attendance/check-in', [AttendanceController::class, 'checkIn'])->name('user.attendance.check-in');
    Route::post('/user/attendance/check-out', [AttendanceController::class, 'checkOut'])->name('user.attendance.check-out');
});

