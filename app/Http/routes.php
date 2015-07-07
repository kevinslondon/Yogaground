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
    'as' => 'apply', 'uses' => 'PageController@showApply'
]);

Route::post('/apply/{workshop}', [
    'as' => 'apply_process', 'uses' => 'PageController@processApply'
]);


