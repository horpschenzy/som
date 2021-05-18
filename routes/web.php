<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// FRONTEND
Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('/courses', 'FrontendController@courses')->name('frontend.courses');
Route::get('/about-us', 'FrontendController@about')->name('frontend.about');
Route::get('/contact-us', 'FrontendController@contact')->name('frontend.contact');
Route::get('/login-register', 'FrontendController@login')->name('frontend.log-in');
Route::get('/register-login', 'FrontendController@register')->name('frontend.register');
Route::get('/global-register', 'FrontendController@global')->name('frontend.global');
Route::post('/somregister', 'FrontendController@store')->name('frontend.store');
Route::post('/globalregister', 'FrontendController@globalstore')->name('frontend.gbobalstore');
Route::get('/payment', 'FrontendController@payment')->name('frontend.payment');
Route::get('/globalpayment', 'FrontendController@globalpayment')->name('frontend.globalpayment');


// PAYSTACK
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');




