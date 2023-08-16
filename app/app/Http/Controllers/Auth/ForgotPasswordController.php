<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
    
        // パスワードリセットトークンを生成してテーブルに保存
        $user = User::where('email', $request->input('email'))->first(); // User モデルを適切なものに置き換える
        $token = $this->broker()->createToken($user);
    
        // パスワードリセットメールを送信
        $resetUrl = url(route('password.reset', [
            'token' => $token,
            'email' => $request->input('email'),
        ], false));
    
        Mail::to($request->input('email'))->send(new ResetPasswordMail($resetUrl));
    
        return back()->with('status', 'パスワードリセットリンクを送信しました！');
    }
}



