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

Route::prefix('admin')->group(function () {
    Route::get('/', ['middleware' => 'admin', function () {
        return view('admin.home');
    }]);

    Route::get('/user', 'AdminController@listUser')->name('users');

    Route::get('/user/{user_id}', [
        'uses' => 'AdminController@getUser',
        'as' => 'adminprofile'
    ]);

    Route::get('/user/edit/{user_id}', [
        'uses' => 'AdminController@getEditUser',
        'as' => 'adminprofile.edit'
    ]);

    //Post
    Route::post('/user/edit/{user_id}', [
        'uses' => 'AdminController@editUser',
        'as' => 'adminprofile.edit'
    ]);

    Route::get('/user/delete/{user_id}', [
        'uses' => 'AdminController@deleteUser',
        'as' => 'adminprofile.delete'
    ]);
});

// Events

Route::prefix('event')->group(function () {
    Route::get('/', 'EventController@index')->name('events');

    Route::get('/{eventid}', [
        'uses' => 'EventController@getEvent',
        'as' => 'event.view'
    ]);
});

Route::get('/event/edit/{user_id}', [
    'uses' => 'EventController@getEditEvent',
    'as' => 'event.edit'
]);

//Post
Route::post('/event/edit/{event_id}', [
    'uses' => 'EventController@editEvent',
    'as' => 'event.edit'
]);

Route::get('/event/delete/{event_id}', [
    'uses' => 'EventController@deleteEvent',
    'as' => 'event.delete'
]);

Route::get('/event/notify/', [
    'uses' => 'EventController@notifyEvent',
    'as' => 'event.notify'
]);


//Notifications
Route::get('/getNotifications', 'NotificationController@getNotifications');
Route::post('deleteNotification', 'NotificationController@deleteNotification');