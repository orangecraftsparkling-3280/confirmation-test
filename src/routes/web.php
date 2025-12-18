<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::get('/', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contacts/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::get('/contacts/confirm', function () {
    return redirect()->route('contact.index');
});
Route::post('/contacts', [ContactController::class, 'store']);
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/thanks', function () {
    return view('thanks');})->name('thanks');