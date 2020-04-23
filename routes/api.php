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

Route::middleware('auth:api')->group(function () {
    Route::get('member_details', 'PassportController@details');
    Route::resource('member', 'api\MembershipsController');
    Route::resource('memberships', 'api\MembershipsController');
    Route::resource('board_members_categories', 'api\BoardMembersCategoriesController');
    Route::resource('board_members', 'api\BoardMembersController');
    Route::resource('events', 'api\EventsController');
    Route::resource('memories','api\MemorisController');
});


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
