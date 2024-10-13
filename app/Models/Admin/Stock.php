<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'stockName',
        'stockPhoto',
        'Course',
        'Gender',
        'Type',
        'Body',
    ];

    // // RELATION TO COURSES TABLE
    // public function departments(){
    //     return $this->belongsTo(Department::class);
    // }
}
