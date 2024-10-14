<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\StudentBag;
use App\Models\Student\Books;

class BookCollection extends Model
{
    use HasFactory;
    protected $fillable = [
        'Department',
        'BookName',      
        'SubjectCode',   
        'SubjectDesc',    
        'code',
        'Status',          
        'claiming_schedule',
        'shift',
        'stubag_id',
        'reservationNumber',
        'dateReceived',  
    ];

    public function studentBag()
    {
        return $this->belongsTo(StudentBag::class, 'stubag_id');
    }
}