<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name','email','password','role'];

    public function children()
    {
        return $this->hasMany(Child::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function progress()
    {
        return $this->hasMany(CourseProgress::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
