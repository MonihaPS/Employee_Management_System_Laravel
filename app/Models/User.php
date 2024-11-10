<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\PseudoTypes\True_;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    // public function admin()
    // {
    //     return $this->hasOne(Admin::class);
    // }

    // public function leaves()
    // {
    //     return $this->hasMany(Leave::class);
    // }

    // public function leaveStatus()
    // {
    // return $this->hasOne(User::class);
    // }
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = True; // Disable timestamps
}