<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('admin', 1)->get();

        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function userProfile($id)
{
    $user = User::findOrFail($id);
    $posts = $user->posts;

    return view('profile', compact('user', 'posts'));
}

    public function search(Request $request)
{
    $keyword = $request->input('keyword');

    $admins = User::where('admin', 0)
        ->where('name', 'like', '%' . $keyword . '%')
        ->get();

    return view('admin.index', compact('admins'));
}

public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->likes()->delete();

    $user->delete();

    return redirect()->route('admin.index')->with('success', 'ユーザーが削除されました');
}

}
