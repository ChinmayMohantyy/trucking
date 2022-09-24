<?php
use App\Http\Controllers\StudentControllers;
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



// Route::get('/home', 'HomeController@index')->name('home');
Route::post('/user-register','Auth\RegisterController@register');

Route::get('/find-load', 'HomeController@index')->name('home');
Route::get('/user','Auth\RegisterController@save');
Route::get('/truck-profile','HomeController@truckshow');
Route::get('my-loade','HomeController@show');
Route::get('/tool-service','HomeController@serviceshow');
Route::get('/post-truck','HomeController@showpost');
Route::get('/my-profile','HomeController@showprofile');
Route::post('/save-posttruck','HomeController@savePostTruck');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});
Auth::routes();
