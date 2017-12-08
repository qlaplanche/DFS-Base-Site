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
Route::get('/404', function(){
    return view('404');
});

Route::prefix('admin')->group(function () {
    Route::get('/', ['middleware' => 'admin', function () {
        return view('admin.home');
    }])->name('admin');

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

Route::prefix('user')->group(function () {
    Route::get('/', 'UserController@index')->name('user');

    Route::get('/edit/{user_id}', [
        'uses' => 'UserController@getEditUser',
        'as' => 'user.edit'
    ]);

    //Post
    Route::post('/edit/{user_id}', [
        'uses' => 'UserController@editUser',
        'as' => 'userpost.edit'
    ]);

    Route::get('/delete/{user_id}', [
        'uses' => 'UserController@deleteUser',
        'as' => 'user.delete'
    ]);

    Route::get('/{user_id}', [
        'uses' => 'UserController@getUser',
        'as' => 'user.profile'
    ]);
});


// Events

Route::prefix('event')->group(function () {
    Route::get('/', 'EventController@indexEvent')->name('events');

    Route::get('/create', [
        'uses' => 'EventController@createEvent',
        'as' => 'event.create'
    ]);

    Route::post('/create', [
        'uses' => 'EventController@storeEvent',
        'as' => 'event.create'
    ]);

    Route::get('/notify/', [
        'uses' => 'EventController@notifyEvent',
        'as' => 'event.notify'
    ]);

    Route::get('/{event_id}/refuse/{user_id}', [
        'uses' => 'EventController@refuse',
        'as' => 'event.refuse'
    ]);

    Route::get('/{event_id}/deleteParticipant/{user_id}', [
        'uses' => 'EventController@deleteParticipant',
        'as' => 'event.participantDelete'
    ]);

    Route::post('/edit/{event_id}', [
        'uses' => 'EventController@editEvent',
        'as' => 'event.edit'
    ]);

    Route::get('/edit/{user_id}', [
        'uses' => 'EventController@getEditEvent',
        'as' => 'event.edit'
    ]);

    Route::get('/{eventid}', [
        'uses' => 'EventController@getEvent',
        'as' => 'event.view'
    ])->where('id', '[0-9]+');

    Route::get('/delete/{eventid}', [
        'uses' => 'EventController@deleteEvent',
        'as' => 'event.delete'
    ]);

});


//Notifications
Route::get('/getNotifications', 'NotificationController@getNotifications');
Route::post('deleteNotification', 'NotificationController@deleteNotification');
