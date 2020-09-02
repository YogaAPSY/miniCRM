<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::resource('company', 'CompanyController')->middleware('auth');
Route::resource('employee', 'EmployeeController')->middleware('auth');

Route::get('lang/{language}', 'LocalizationController@switch')->name('localization.switch');

Route::get('/home', function () {

    return view('home');
})->name('home')->middleware('auth');
