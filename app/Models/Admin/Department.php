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
    ];
    
    public function courses(){
        return $this->hasMany(Course::class);
    }
}
