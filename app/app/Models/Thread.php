<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


class Thread extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}

public function posts()
{
    return $this->hasMany(Post::class);
}

protected $fillable = [
    'title','user_id','overview' // 他のカラムも適宜追加
];
public $timestamps = true;
// 他のモデル関連やメソッドなど...
}

