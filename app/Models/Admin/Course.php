<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'courseName',
        'departmentID',
        'courseDescription',
    ];

    // RELATION TO DEPARTMENTS TABLE
    public function department(){
        return $this->belongsTo(Department::class);
    }

    // RELATION TO STOCK TABLE
    public function stock(){
        return $this->hasMany(Stock::class);
    }
    
    // // RELATION TO ITEM_Books TABLE
    // public function books(){
    //     return $this->hasMany(Books::class);
    // }

    // // RELATION TO ITEM_lowerUniform TABLE
    // public function lowerUniform(){
    //     return $this->hasMany(lowerUniform::class);
    // }

    // // RELATION TO ITEM_upperUniform TABLE
    // public function upperUniform(){
    //     return $this->hasMany(upperUniform::class);
    // }

    // // RELATION TO ITEM_upperUniform TABLE
    // public function rso(){
    //     return $this->hasMany(rso::class);
    // }
}
