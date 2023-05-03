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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

        /**
         * Password Reset Routes
         */
        Route::get('/forget-password', 'ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
        Route::post('/forget-password', 'ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
        Route::get('/reset-password/{token}', 'ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
        Route::post('/reset-password', 'ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');

        Route::get('/authorized/google', 'LoginWithGoogleController@redirectToGoogle');
        Route::get('/authorized/google/callback', 'LoginWithGoogleController@handleGoogleCallback');
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * Verification Routes
         */
        Route::get('/phone/verify', 'VerificationController@phone')->name('verification.phone');
        Route::post('/phone/verify', 'VerificationController@updatePhone')->name('verification.updatePhone');
        Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
        Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
        Route::get('/email/change', 'VerificationController@indexEmail')->name('verification.edit');
        Route::post('/email/change', 'VerificationController@updateEmail')->name('verification.update');
    });

    Route::group(['middleware' => ['auth', 'verified', 'checkPhone']], function () {
        /**
         * Dashboard Routes
         */
        Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard.index');

        Route::resource('/contacts', 'ContactController');
        Route::get('/search', 'ContactController@search')->name('contacts.search');
    });
});
