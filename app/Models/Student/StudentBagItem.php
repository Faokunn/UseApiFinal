<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\StudentBag;

class StudentBagItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'Department',
        'Course',
        'Gender',
        'Type',
        'Body',
        'Size',
        'Status',
        'code',
        'stubag_id',
        'claiming_schedule',
        'dateReceived'
    ];

    public function studentBag()
    {
        return $this->belongsTo(StudentBag::class, 'stubag_id');
    }
}