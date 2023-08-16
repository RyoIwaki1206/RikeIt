<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Image;


class ThreadController extends Controller
{

    public function create()
    {
    return view('create_thread');
    }
    
    public function store(Request $request)
    {
        // リクエストから入力データを取得
        $data = $request->all();

        $user_id = Auth::id();

        // Thread モデルを使用してスレッドを作成
        $thread = Thread::create([
            'user_id' => $user_id,
            'title' => $data['title'],
            'overview' => $data['overview'],
            
            // 他のカラムも適宜追加
        ]);

        // スレッド作成が成功した場合の処理（例えばリダイレクトなど）
        return redirect()->route('threads.show', ['thread' => $thread->id])
                         ->with('success', 'スレッドが作成されました！');
    }
    public function show(Thread $thread)
    {
        $posts = Post::where('thread_id', $thread->id)->get();
    
        $postsWithImages = [];
        foreach ($posts as $post) {
            $images = Image::where('post_id', $post->id)->get();
            $postsWithImages[] = [
                'post' => $post,
                'images' => $images,
            ];
        }
    
        return view('threads.show', compact('thread', 'postsWithImages'));
    }
    public function index()
{
    $threads = Thread::all(); 
    return view('home', compact('threads'));
}


}
