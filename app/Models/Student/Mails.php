<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\Student;

class Mails extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'time',
        'notificationId'
    ];

    public function notification()
    {
        return $this->belongsTo(Notification::class, 'notificationId');
    }
}
