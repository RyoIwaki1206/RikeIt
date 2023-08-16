<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Image extends Model
{
    protected $fillable = ['post_id', 'path'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public $timestamps = false;
}
