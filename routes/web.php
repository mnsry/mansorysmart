<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FileController;
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
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/post/{post}', [HomeController::class, 'post'])->name('post');
/*
|--------------------------------------------------------------------------
| Search Routes
|--------------------------------------------------------------------------
*/
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search/select', [SearchController::class, 'searchSelect'])->name('search.select');
Route::get('/search/show-fields', [SearchController::class, 'searchShowFields'])->name('search.show.fields');
Route::get('/search/select-field', [SearchController::class, 'searchSelectField'])->name('search.select.field');
Route::get('/search/find', [SearchController::class, 'searchFind'])->name('search.find');
/*
|--------------------------------------------------------------------------
| File Routes
|--------------------------------------------------------------------------
*/
Route::get('/file/select', [FileController::class, 'select'])->name('file.select');
Route::put('file/{file}/like', [FileController::class, 'like'])->name('file.like');
Route::put('file/{file}/shekar', [FileController::class, 'shekar'])->name('file.shekar');
Route::resource('file', FileController::class);
/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/user', [HomeController::class, 'user'])->name('user');
Route::post('/user', [HomeController::class, 'userUpdate'])->name('user.update');

Route::middleware(['auth'])->prefix('panel')->group(function () {
    Route::get('/dashboard', [PartnerController::class, 'dashboard'])->name('dashboard');
    Route::get('/projects', [PartnerController::class, 'projects'])->name('projects');
    Route::get('/projects/{project}', [PartnerController::class, 'projectShow'])->name('projects.show');
    Route::get('/commissions', [PartnerController::class, 'commissions'])->name('commissions');
    Route::get('/referral', [PartnerController::class, 'referral'])->name('referral');
    Route::get('/profile', [PartnerController::class, 'profile'])->name('profile.edit');
    Route::post('/profile', [PartnerController::class, 'profileUpdate'])->name('profile.update');
    //
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/projects', [CustomerController::class, 'projects'])->name('customer.projects');
    Route::get('/projects/{project}', [CustomerController::class, 'projectShow'])->name('customer.projects.show');
    Route::get('/tickets', [CustomerController::class, 'tickets'])->name('customer.tickets');
    Route::get('/tickets/create', [CustomerController::class, 'ticketCreate'])->name('customer.tickets.create');
    Route::post('/tickets', [CustomerController::class, 'ticketStore'])->name('customer.tickets.store');
    Route::get('/profile', [CustomerController::class, 'profile'])->name('customer.profile.edit');
    Route::post('/profile', [CustomerController::class, 'profileUpdate'])->name('customer.profile.update');
});
