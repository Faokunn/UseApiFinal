<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\BookCollection;
use App\Models\Student\StudentBagItem;

class StudentBag extends Model
{   
    use HasFactory;
    protected $fillable = [
        'stu_id'
    ];
    public function studentBagItems(){
        return $this->hasMany(StudentBagItem::class,'stubag_id');
    }
    public function bookCollection(){
        return $this->hasMany(BookCollection::class,'stubag_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'stu_id', 'studentId');
    }
}
