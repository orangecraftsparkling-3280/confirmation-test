<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// お問い合わせ（未ログインOK）
Route::get('/', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/edit', [ContactController::class, 'edit'])
    ->name('contact.edit');
Route::post('/contacts/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contacts', [ContactController::class, 'store'])->name('contact.store');
Route::get('/thanks', fn() => view('thanks'))->name('thanks');

// 管理画面（ログイン必須）
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::delete('/contacts/{id}', [AdminController::class, 'destroy']);
    Route::get('/export', [AdminController::class, 'export'])->name('admin.export');
});
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
