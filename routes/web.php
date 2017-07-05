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
Auth::routes();
Route::get('/', 'HomeController@check');
Route::get('asknepal', 'HomeController@check');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('asknepal/discussion/{slug}','HomeController@discussion');
Route::get('asknepal/guestforum/{slug}', 'HomeController@guestforum');
Route::post('asknepal','HomeController@index'); //for search

Route::get('ask','PostController@create')->middleware('auth');
Route::post('ask','PostController@store');
Route::get('post/edit/{Pid}','PostController@edit');
Route::post('post/edit/{Pid}','PostController@update');
Route::get('post/delete/{Pid}','PostController@delete');
Route::get('discussionpost/delete/{id}', 'PostController@deleteDiscussionPost');


Route::post('savereply','ReplyController@savereply');
Route::post('editreply','ReplyController@edit');
Route::get('deletereply/{id}','ReplyController@deletereply');
Route::get('updatereply','ReplyController@updatereply');



Route::get('markasread', function(){
	Auth::user()->unreadNotifications->markAsRead();
});

Route::get('user/profile/{id}','UserController@UserProfile');
Route::post('user/profile/UpdateAvatar','UserController@UpdateAvatar');
Route::get('DeleteUser/{id}','UserController@DeleteUser')->middleware('auth');





