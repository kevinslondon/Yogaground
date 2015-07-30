<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/{url}','PageController@showPage' )
    ->where('url', '$|about|lessons|workshops|yoga_one_to_one|okido|alexander_tech');


Route::get('/reviews', [
    'as' => 'lessons', 'uses' => 'PageController@showReviews'
]);

Route::get('/contact', [
    'as' => 'lessons', 'uses' => 'PageController@showContact'
]);

Route::post('/contact', [
    'as' => 'lessons', 'uses' => 'PageController@processContact'
]);

Route::get('/apply/{workshop}', [
    'as' => 'apply', 'uses' => 'WorkshopController@showApply'
]);

Route::post('/apply/{workshop}', [
    'as' => 'apply_process', 'uses' => 'WorkshopController@processApply'
]);

Route::get('/pay/{workshop}', [
    'as' => 'pay', 'uses' => 'WorkshopController@showPay'
]);


Route::get('/admin/workshop_admin',['middleware' => 'auth',
    'uses' => 'Auth\Workshops@getWorkshops']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');



