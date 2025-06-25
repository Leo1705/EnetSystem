<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = ['user_id','name','grade','avatar_url'];

    public function parent()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
