<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function () { Voyager::routes(); });
Auth::routes();
/*
|--------------------------------------------------------------------------
| Email AND Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $r) {
    $r->fulfill();
    return redirect('/home')->with('status', 'حسابتان تایید شد');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $r) {
    $r->user()->sendEmailVerificationNotification();
    return back()->with('resent', 'Verification link sent ');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/panel', [HomeController::class, 'panel'])->name('panel');
    Route::get('/mqtt', [HomeController::class, 'mqtt'])->name('mqtt');
});
