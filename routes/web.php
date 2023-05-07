<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'index')->name('home');
Route::post('contact', [ ContactController::class ,'send'])->name('contact.send');
Route::get('/merci', function () {
    if( request()->session()->has('msg_thanks') ) return view('thanks');

    return redirect()->route('home');
})->name('msg.thanks');
