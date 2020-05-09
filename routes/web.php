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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('board_members', 'BoardMembersController');

Route::resource('board_members_categories', 'BoardMembersCategoriesController');
Route::resource('contact_us', 'ContactUsController');
Route::resource('event_ticket_buyers', 'EventTicketBuyersController');
Route::resource('event_ticket_payments', 'EventTicketPaymentsController');
Route::resource('events', 'EventsController');
Route::resource('member_devices', 'MemberDevicesController');
Route::resource('member_job_infos', 'MemberJobInfosController');
Route::resource('member_personal_infos', 'MemberPersonalInfosController');
Route::resource('membership_payments', 'MembershipPaymentsController');
Route::resource('memberships', 'MembershipsController');
Route::resource('memories', 'MemorisController');
Route::get('memories_photos_add', 'MemoriesPhotosController@add');
Route::resource('memories_photos', 'MemoriesPhotosController');
Route::resource('messages', 'MessagesController');
Route::resource('organize_infos', 'OrganizeInfosController');
Route::resource('sponsors', 'SponsorsController');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return view('welcome');
});


Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
