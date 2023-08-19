<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\CustomerRegistrationController;
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

Route::get('/', function () {
    return view('login.create');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard'); // This middleware will responible to send the email verification.

// Registeration
Route::resource('registration/admin', 'AdminRegistrationController');
Route::resource('registration/customer', 'CustomerRegistrationController');

// Login
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('logout');


