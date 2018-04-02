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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('rooms/{id}', 'RoomsController@show');
Route::resource('room', 'RoomsController');
Route::resource('rooms', 'RoomController');
Route::get('roomExport', 'RoomsController@roomExport')->name('rooms.export');

Route::get('guestDisable/{id}', 'GuestController@disable')->name('guest.disable');


Route::resource('reservation', 'ReservationController');
Route::get('reservationShow/{id}', 'ReservationController@reservationShow')->name('reservation.reservationShow');
Route::get('reservationAccept/{id}', 'ReservationController@accept')->name('reservation.accept');
Route::get('reservationUndo/{id}', 'ReservationController@undo')->name('reservation.undo');
Route::get('reservationCancel/{id}', 'ReservationController@cancel')->name('reservation.cancel');
Route::get('reservation/{id}', 'ReservationController@show');


Route::get('profile/{id}', 'UserController@show');


Route::resource('guest','GuestController');
Route::get('guestProfile/{id}', 'GuestController@show');
Route::get('guestExport', 'GuestController@guestExport')->name('guest.export');



Route::get('checkIn/{id}', 'ConfirmationController@checkIn');
Route::get('checkOut/{id}', 'ConfirmationController@checkOut');
Route::resource('confirmation', 'ConfirmationController');

Route::resource('events', 'CalendarController');

Route::resource('user', 'UserController');
Route::get('userExport', 'UserController@userExport')->name('user.export');


Route::get('feedbackDisable/{id}', 'FeedbackController@disable')->name('feedback.disable');
Route::get('feedbackEnable/{id}', 'FeedbackController@enable')->name('feedback.enable');
Route::resource('feedback', 'FeedbackController');
Route::get('feedbackExport', 'FeedbackController@feedbackExport')->name('feedback.export');




