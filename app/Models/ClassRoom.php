<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// ClassRoom.php
class ClassRoom extends Model
{
    protected $fillable = [
        'name',
        'code',
        'capacity',
        'status'
    ];


    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'class_room_student', 'class_room_id', 'student_id');
    }


}
