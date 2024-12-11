<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | このコントローラーは、アプリケーションへのユーザー認証を処理し、
    | ユーザーをホーム画面にリダイレクトします。このコントローラーは、
    | 認証に必要な機能を提供するトレイトを使用します。
    |
    */

    use AuthenticatesUsers;

    /**
     * ログイン後のリダイレクト先
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * 新しいコントローラーのインスタンスを作成します。
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
