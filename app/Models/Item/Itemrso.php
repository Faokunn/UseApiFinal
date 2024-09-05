<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itemrso extends Model
{
    use HasFactory;
    protected $fillable = [
        'Department',
        'Size',
        'Stock',
    ];
}
