<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


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

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/login', [MainController::class, 'login'])->name('login');
Route::post('/login', [MainController::class, 'loginCheck']);
Route::get('/register', [MainController::class, 'register'])->name('register');
Route::post('/register', [MainController::class, 'registerData']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logOut', [MainController::class, 'logOut'])->name('logOut');

    Route::get('/booking', [MainController::class, 'booking'])->name('booking');
    Route::post('/bookingSearch', [MainController::class, 'bookingSearch'])->name('bookingSearch');
    Route::get('/booked/{id}', [MainController::class, 'booked']);
    Route::post('/booked', [MainController::class, 'confirmBooked'])->name('booked');
    Route::get('/back', [MainController::class, 'back'])->name('back');
    Route::get('/bookedCancel/{id}', [MainController::class, 'bookedCancel']);

    Route::get('/showTickets', [MainController::class, 'showTickets'])->name('showTickets');

    Route::get('/showPurchased', [MainController::class, 'showPurchased'])->name('showPurchased')->middleware('roleCheck');

    Route::get('/profile/{name}', [MainController::class, 'profile']);
});
