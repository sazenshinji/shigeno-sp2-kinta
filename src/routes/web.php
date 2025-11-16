<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Auth;

Route::redirect('/', '/attendance');

Route::get('/attendance', [AttendanceController::class, 'index']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');   // ← login画面へ遷移
})->name('logout');