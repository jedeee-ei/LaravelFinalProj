<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Attendance.php
class Attendance extends Model
{
    protected $fillable = ['class_room_id', 'student_id', 'date', 'status'];

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
