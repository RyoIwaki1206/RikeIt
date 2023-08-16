<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThreadRequest extends Model
{
    protected $fillable = ['user_id', 'title', 'status'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
