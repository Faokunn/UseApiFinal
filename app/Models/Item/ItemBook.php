<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemBook extends Model
{
    use HasFactory;
    protected $fillable = [
        'Department',
        'BookName',      
        'SubjectCode',   
        'SubjectDesc',     
        'Stock',
        'Reserved'
    ];
}
