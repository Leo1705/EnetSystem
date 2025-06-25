<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = ['course_id','group_id','title','due_at','status'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
