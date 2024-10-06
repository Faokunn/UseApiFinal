<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\Student;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'FirstName',
        'LastName',
        'Course',
        'Department',
        'Year',
        'Status',
        'stu_id'
    ];
    protected $casts = [
        'hasUUniform' => 'boolean',
        'hasLUniform' => 'boolean',
        'hasRSO' => 'boolean',
        'hasBooks' => 'boolean',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'stu_id', 'studentId');
    }
}