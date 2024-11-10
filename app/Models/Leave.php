<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'role',
        'reason',
        'status',
        'Leave Days',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusTextAttribute()
    {
        $statusTexts = [
            0 => 'Pending',
            1 => 'Approved',
            2 => 'Declined',
        ];

        return $statusTexts[$this->status];
    }

    public function getLeaveDaysAttribute()
    {
        $startDate = new \DateTime($this->start_date);
        $endDate = new \DateTime($this->end_date);
        $interval = $startDate->diff($endDate);
        return $interval->days + 1; // +1 to include both start and end date
    }
}
