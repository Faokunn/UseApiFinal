<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemLowerUniform extends Model
{
    use HasFactory;
    protected $fillable = [
        'Department',
        'Size',
        'Stock',
    ];
}
