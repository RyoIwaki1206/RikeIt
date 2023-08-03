<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 


class ProfileController extends Controller
{
    public function show ()
    {
        $user = Auth::user();
        $posts = $user->posts()->latest()->get();
        $likes = $user->likes()->with('post')->get();

        return view('profile', compact('posts', 'likes'));
    }

    public function edit()
    {
        $user = Auth::user();
        // プロフィール情報を取得するロジックを記述
        // 例えば、以下のようにデータを取得してビューに渡す
        $profile_image = $user->profile_image;
        $name = $user->name;
        $user_id = $user->user_id;

        return view('profile_edit', compact('user'));
    }

    public function save(Request $request)
    {
        // バリデーションを行う（必要に応じて）
        $request->validate([
            'name' => 'required|string|max:255',
            // 他のフィールドに対するバリデーションルールを記述
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
