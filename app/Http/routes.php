<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'PagesController@index');
    Route::get('about', 'PagesController@about');
    Route::get('contact', 'PagesController@contact');
    Route::auth();

    Route::get('work/{id}', 'PagesController@work');
    Route::post('sendemail/', 'PagesController@sendEmail');
});


Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('admin', 'AdminController');
});
