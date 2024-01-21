<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailLogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
// Home and Auth routes
Route::get('/', [AuthController::class, 'index'])->name('site.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// MailLog routes
Route::group(['prefix' => 'mailLog', 'as' => 'mailLog.', 'middleware' => ['auth']], function(){
    Route::get('/', [MailLogController::class, 'index'])->name('index');
    Route::get('/create', [MailLogController::class, 'create'])->name('create');
    Route::post('/store', [MailLogController::class, 'store'])->name('store');
    Route::post('/upload-images', [MailLogController::class, 'uploadCKImage'])->name('image.upload');
});

