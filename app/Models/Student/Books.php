<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\Student;
use App\Models\Student\BookCollection;

class Books extends Model
{
    use HasFactory;
    protected $fillable = [
        'BookName',
        'SubjectCode',
        'SubjectDesc',
        'hasBook',
        'code',
        'bookCollection_id',
    ];

    protected $casts = [
        'hasBooks' => 'boolean'
    ];

    public function bookCollection(){
        return $this->belongsTo(BookCollection::class, 'bookCollection_id');
    }

    
}
