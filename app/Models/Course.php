<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title','description','image_url','teacher_id'];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
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
