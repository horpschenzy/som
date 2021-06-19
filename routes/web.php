<?php

use Illuminate\Support\Facades\Route;
use App\User;

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
Route::get('/confirmation', 'FrontendController@global')->name('frontend.confirmation');
Route::post('/somregister', 'FrontendController@store')->name('frontend.store');
Route::get('/payment', 'FrontendController@payment')->name('frontend.payment');
Route::get('/invoice', 'FrontendController@invoice')->name('frontend.invoice');


// PAYSTACK
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');


Route::middleware(['auth'])->group(function () {
    Route::middleware(['user.student', 'member.access'])->group(function () {
        Route::get('/payment', 'FrontendController@payment')->name('frontend.payment');
        Route::get('/member/dashboard', 'MemberController@index')->name('member.dashboard');
        Route::get('/member/classroom', 'MemberController@classroom')->name('member.classroom');
        Route::get('/member/classroom/{id}/{type}', 'MemberController@showClassroom');
        Route::get('/member/test', 'MemberController@test')->name('member.test');
        Route::get('/member/transaction', 'MemberController@transaction')->name('member.transaction');
        Route::get('/member/profile', 'MemberController@profile')->name('member.profile');
        Route::get('/member/assignment', 'MemberController@assignment')->name('member.assignment');
        Route::post('/member/profile/save', 'MemberController@updateProfile')->name('member.profile.update');

        Route::get('/member/result', 'MemberController@result')->name('member.result');
        Route::post('/member/password/change', 'MemberController@changePassword')->name('member.password.change');



    });

    Route::middleware(['user.admin'])->group(function () {
        Route::get('/dashboard', 'AdminController@index')->name('dashboard');
        Route::get('/regstudent', 'AdminController@regstudent')->name('regstudent');
        Route::get('/paidstudent', 'AdminController@paidstudent')->name('paidstudent');
        Route::get('/unpaidstudent', 'AdminController@unpaidstudent')->name('unpaidstudent');
        Route::get('/announcement', 'AnnouncementController@index')->name('announcement');
        Route::get('/attendance', 'AttendanceController@index')->name('attendance');
        route::get('/assignment', 'AssignmentController@index')->name('assignment');
        Route::get('/attendanceresult', 'AttendanceController@attendanceresult')->name('attendanceresult');
        Route::get('/mark', 'AttendanceController@mark')->name('mark');
        Route::get('/transaction', 'AdminController@transaction')->name('transaction');
        Route::get('/profile', 'AdminController@profile')->name('profile');
        Route::get('/classroom', 'AdminController@classroom')->name('classroom');
        Route::get('/classroom/{id}/{type}', 'AdminController@showClassroom');
        Route::get('/test', 'AdminController@test')->name('test');
        Route::get('/result', 'AdminController@result')->name('result');
        Route::get('/livestream', 'AdminController@livestream')->name('livestream');
        Route::post('/livestream', 'LivestreamController@store');
        Route::post('/end', 'LivestreamController@end');
        Route::post('/start', 'LivestreamController@start');
        Route::post('/delete/stream', 'LivestreamController@delete');
        Route::get('/sendmail', 'AdminController@sendmail');
        Route::get('/admin/email', 'AdminController@email')->name('admin.email');
    });
});


// Route::get('/email', function () {

//     $users = User::all();
//     return view('emails.welcomemail', compact( 'users'));

// });
