<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\StudentBag;

class lowerUniform extends Model
{
    use HasFactory;
    protected $fillable = [
        'LowerSize',
        'Status',
        'code',
        'stubag_id'
    ];
    public function studentBag(){
        return $this->belongsTo(StudentBag::class,'stubag_id');
    }

    
}
