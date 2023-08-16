<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function isLikedByUser()
{
    return $this->likes()->where('user_id', auth()->id())->exists();
}
}    
