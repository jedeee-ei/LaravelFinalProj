<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Student.php
class Student extends Model
{
    protected $fillable = ['name', 'email', 'student_id', 'status'];

    public function classes()
    {
        return $this->belongsToMany(ClassRoom::class, 'class_student');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
