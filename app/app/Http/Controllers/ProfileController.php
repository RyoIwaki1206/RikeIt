<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;


class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user(); // ログインユーザーを取得

        // ユーザーの投稿といいねを取得
        $posts = $user->posts()->with('image')->get();
        $likedPosts = $user->likedPosts;

        return view('profile', compact('user', 'posts', 'likedPosts'));
    }
    public function edit()
    {
        $user = Auth::user();
        $profile_image = $user->profile_image;
        $name = $user->name;
        $user_id = $user->user_id;

        return view('profile_edit', compact('user'));
    }

    public function save(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            
        ]);

        // ユーザーの情報を取得
        $user = Auth::user();

        // ユーザーの情報を更新
        $user->name = $request->input('name');
        // 他のフィールドに対する更新処理を記述

        // 保存を実行
        $user->save();

        // 保存が成功した場合は、リダイレクトしてprofile.blade.phpに遷移する
        return redirect()->route('profile');
    }
}
