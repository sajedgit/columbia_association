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



Route::group([ 'middleware' => 'admin_middleware'], function()
{
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', function () {
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
    Route::resource('products', 'ProductsController');
    Route::resource('votes', 'VotesController');
    Route::resource('votes_position', 'VotePositionsController');
    Route::resource('candidates', 'VoteCandidatesController');
    Route::resource('ess_members', 'EssMembersController');
    Route::resource('settings', 'SettingsController');
});




Auth::routes();

Route::get('/home', 'HomeController@welcome')->name('home');
Route::get('/unauthorized', 'UnAuthorizedController@index')->name('unauthorized');


//Route::get('/home', function () {
//    return view('welcome');
//});


Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return '<br/><br/><br/><h1 align="center">Cache clear completed</h1>'; //Return anything
});

Route::get('handle-payment', 'PayPalPaymentController@handlePayment')->name('make.payment');
Route::get('cancel-payment', 'PayPalPaymentController@paymentCancel')->name('cancel.payment');
Route::get('/payment_success/{details}', 'PayPalPaymentController@paymentSuccess')->name('payment_success');
Route::get('product_payment', 'PayPalPaymentController@productPayment')->name('product.payment');
Route::post('process_payment', 'PayPalPaymentController@processPayment')->name('process_payment');

Route::get('event_payment', 'PayPalPaymentController@eventPayment')->name('event.payment');




//Route::get('/test_payment', function () {
//    return view('test_payment');
//});

/**/
//Route::get('/composer_update', function () {
//    $exitCode = Artisan::call('composer update');
//    return 'DONE'; //Return anything
//});