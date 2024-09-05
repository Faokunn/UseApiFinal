<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Student\Mails;
use App\Models\Student\Student;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'stu_id'
    ];
    public function student(){
        return $this->belongsTo(Student::class, 'stu_id', 'studentId');
    }

    public function mail(){
        return $this->hasMany(Mails::class, 'notificationId');
    }

    
}
