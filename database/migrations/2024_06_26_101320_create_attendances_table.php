<?php

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->enum('status', ['present', 'absent', 'late'])->default('present');
            $table->time('check_in');
            $table->time('check_out');
            $table->timestamps();
        });
    }

    public function checkIn(User $user)
    {
        $attendance = Attendance::create([
            'user_id' => $user->id,
            'date' => Carbon::now()->toDateString(),
            'check_in' => Carbon::now()->toTimeString(),
            'status' => 'present', // Assuming default status is 'present'
        ]);

        return $attendance;
    }

    public function checkOut(User $user)
    {
        $attendance = Attendance::where('user_id', $user->id)
            ->whereDate('date', Carbon::today())
            ->latest()
            ->first();

        if ($attendance) {
            $attendance->update([
                'check_out' => Carbon::now()->toTimeString(),
            ]);
        }

        return $attendance;
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
};