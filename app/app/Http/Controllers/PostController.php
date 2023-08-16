<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Post; 
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Models\User;
use App\Models\Like;

class PostController extends Controller
{
    public function create()
    {
        $threads = Thread::all();
        return view('post_create', compact('threads'));
    }

    // protected $fillable = ['thread_id', 'content']; これは使わなくても大丈夫です

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'thread_id' => 'required|exists:threads,id',
            'content' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post();
        $post->thread_id = $request->input('thread_id');
        $post->content = $request->input('content');
        $post->user_id = Auth::id();
        $post->save();
         

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            
            $image = new Image();
            $image->post_id = $post->id; // 投稿のIDを設定
            $image->path = $imagePath;
            $image->save();
        }

    
        return redirect()->route('home')->with('success', '投稿が保存されました！');
    }

    public function toggleLike(Request $request, $postId)
{
    $user = auth()->user();
    $post = Post::find($postId);

    if (!$post) {
        return response()->json(['error' => '投稿が見つかりません'], 404);
    }

    if ($user->likedPosts->contains($post)) {
        $user->likedPosts()->detach($post);
        $isLiked = false;
    } else {
        $user->likedPosts()->attach($post);
        $isLiked = true;
    }

    $likeCount = $post->likes->count();

    return response()->json(['likeCount' => $likeCount, 'isLiked' => $isLiked]);
    }

    }





