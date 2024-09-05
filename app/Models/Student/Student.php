<?php

namespace App\Models\Student;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Student\Notification;
use App\Models\Student\StudentBag;
use App\Models\Student\Profile;

class Student extends Authenticatable
{
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'studentId',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the profile associated with the student.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class, 'stu_id', 'studentId');
    }

    /**
     * Get the student bag associated with the student.
     */
    public function studentBag()
    {
        return $this->hasOne(StudentBag::class, 'stu_id', 'studentId');
    }

    /**
     * Get the notification associated with the student.
     */
    public function notification()
    {
        return $this->hasOne(Notification::class, 'stu_id', 'studentId');
    }
}
