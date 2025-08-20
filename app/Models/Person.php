<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['name','role','group_count'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
