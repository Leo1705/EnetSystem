<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['course_id','name','schedule_day','schedule_time','max_students'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
