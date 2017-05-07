<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'dob', 'department_id', 'batch'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the department associated with the user.
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    /**
     * Get the attendance of the user.
     */
    public function present()
    {
        return $this->hasMany('App\Attendance')->where('attendance', 1);
    }

    /**
     * Get the attendance of the user.
     */
    public function attendance()
    {
        return $this->hasMany('App\Attendance');
    }
}
