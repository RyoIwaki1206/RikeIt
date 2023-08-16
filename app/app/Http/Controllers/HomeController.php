<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
{
    $threads = Thread::all(); // ここでクエリを取得します
    session(['threads' => $threads]);


    return view('home', compact('threads'));
}
}
