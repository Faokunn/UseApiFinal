<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'color',
        'photo',
        'reserved',
        'claim',
        'completed'
    ];
    
    public function courses(){
        return $this->hasMany(Course::class);
    }
    
    public function stocks(){
        return $this->hasMany(Stock::class);
    }
}
