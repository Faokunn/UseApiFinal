<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\StudentBag;

class rso extends Model
{
    use HasFactory;
    protected $fillable = [
        'RsoSize',
        'Status',
        'code',
        'stubag_id'
    ];
    public function studentBag(){
        return $this->belongsTo(StudentBag::class,'stubag_id');
    }

    
}
