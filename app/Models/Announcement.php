<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['text','start_at','end_at','target'];

    // If you want only “active” announcements:
    public function scopeActive($q)
    {
        return $q->where('start_at','<=',now())
                 ->where(function($q){
                   $q->whereNull('end_at')->orWhere('end_at','>=',now());
                 });
    }
}
