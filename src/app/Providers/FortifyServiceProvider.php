<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Requests\LoginRequest as CustomLoginRequest;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        /*
        |--------------------------------------------------------------------------
        | 会員登録
        |--------------------------------------------------------------------------
        */
        Fortify::createUsersUsing(CreateNewUser::class);

        /*
        |--------------------------------------------------------------------------
        | 会員登録画面
        |--------------------------------------------------------------------------
        */
        Fortify::registerView(function () {
            return view('auth.register');
        });

        /*
        |--------------------------------------------------------------------------
        | ログイン画面
        |--------------------------------------------------------------------------
        */
        Fortify::loginView(function () {
            return view('auth.login');
        });

        /*
        |--------------------------------------------------------------------------
        | ★ ログイン処理（role=0 のみ許可）
        |--------------------------------------------------------------------------
        */
        Fortify::authenticateUsing(function (Request $request) {

            // Fortify の Request を自作 LoginRequest に変換
            $custom = CustomLoginRequest::createFrom($request);

            // バリデーション実行
            $custom->validate($custom->rules());

            // authenticate() 実行（role=0 のみログイン）
            $custom->authenticate();

            return Auth::user();
        });

        /*
        |--------------------------------------------------------------------------
        | ログイン試行回数制限
        |--------------------------------------------------------------------------
        */
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            return Limit::perMinute(10)->by($email . $request->ip());
        });
    }
}
