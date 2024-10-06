<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = [
        'department',
        'body',
    ];
    public function date()
    {
        return $this->created_at->toDateString(); 
    }
}
