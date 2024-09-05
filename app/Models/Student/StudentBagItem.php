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
        'Type',
        'Body',
        'Size',
        'Status',
        'code',
        'stubag_id',
        'dateReceived'
    ];

    public function studentBag()
    {
        return $this->belongsTo(StudentBag::class, 'stubag_id');
    }
}
