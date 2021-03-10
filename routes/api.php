<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');


Route::get('password/forgot_password', 'api\AuthAPIController@forgotPassword');
//Route::post('password/reset', 'api\AuthAPIController@passwordReset'); /// not use yet

Route::post('contact_us', 'api\ContactController@index');

Route::middleware('auth:api')->group(function () {
    Route::get('member_details', 'PassportController@details');
    Route::resource('member', 'api\MembershipsController');
    Route::resource('memberships', 'api\MembershipsController');
    Route::post('forgot_password', 'api\MembershipsController@forgot_password');
    Route::resource('board_members_categories', 'api\BoardMembersCategoriesController');
    Route::resource('board_members', 'api\BoardMembersController');
    Route::resource('events', 'api\EventsController');
    Route::resource('memories','api\MemorisController');
    Route::resource('sponsors', 'api\SponsorsController');
    Route::resource('messages', 'api\MessagesController');
    Route::resource('shop', 'api\ProductsController');
    Route::get('vote', 'api\VoteDetailsController@index'); //previous vote
    Route::post('vote/{id}', 'api\VoteDetailsController@check_user_vote'); //new vote (added by raju)
    Route::post('insert_vote', 'api\VoteDetailsController@insert_vote');
   // Route::post('shop', 'api\ProductsController@index');
   // Route::put('buy_product', 'api\ProductsController@buy_product');
    Route::post('slider_photo', 'api\SlidersController@index');
});

//Route::get('shop', 'api\ProductsController@index');
//Route::get('vote', 'api\VoteDetailsController@index');
//Route::get('insert_vote', 'api\VoteDetailsController@insert_vote');


Route::get('/clear-cache', function() {
    $exitCode1 = Artisan::call('config:cache');
    $exitCode2 = Artisan::call('config:clear');
    $exitCode3 = Artisan::call('cache:clear');
    return 'DONE'; //Return anything
});
