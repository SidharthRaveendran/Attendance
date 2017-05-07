<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'staff', 'as' => 'staff.'], function () {
  Route::get('/login', 'StaffAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StaffAuth\LoginController@login');
  Route::post('/logout', 'StaffAuth\LoginController@logout');

  Route::get('/register', 'StaffAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'StaffAuth\RegisterController@register');

  Route::post('/password/email', 'StaffAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'StaffAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'StaffAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'StaffAuth\ResetPasswordController@showResetForm');
});
