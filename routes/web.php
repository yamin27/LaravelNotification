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
//    \App\User::find(1)->notify(new \App\Notifications\AdminNotification());
//    return auth()->user();
    $users = \App\User::find(1);
    Notification::send($users, new \App\Notifications\AdminNotification());
    return view('welcome');
});

Route::get('markAsRead', function (){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

