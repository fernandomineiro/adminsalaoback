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


Route::group(['prefix' => 'user'], function () {


    Route::group(['middleware' => ['auth:appUser']], function () {
        Route::post('booking', 'BookingMasterController@store');
        Route::get('booking', 'BookingMasterController@userBooking');
        Route::get('booking/{id}', 'BookingMasterController@singleBooking');

        Route::post('newpassword', 'AppUsersController@newPassword');
        Route::post('review', 'Admin\ReviewController@store');

        Route::post('profile/update', 'AppUsersController@profileUpdate');
        Route::post('profile/password/update', 'AppUsersController@password');
        Route::post('profile/picture/update', 'AppUsersController@profilePictureUpdate');
        Route::get('notification', 'AppUsersController@notiList');
        Route::get('favorite/salon/{id}', 'AppUsersController@userFevSalon');
        Route::get('favorite/salon', 'AppUsersController@userFevSalonList');
        Route::get('profile', function (Request $request) {
            return $request->user();
        });
    });
    Route::group(['namespace' => 'Admin'], function () {
        Route::get('home', 'BranchController@apiHome');
        Route::get('category/{id}/branch', 'BranchController@branchByCategory');
        Route::get('category/{id}/branch', 'BranchController@branchByCategory');
        Route::get('branch/{id}', 'BranchController@singleBranch');
        Route::get('branch', 'BranchController@allBranch');
        Route::get('filleter/branch/{type}', 'BranchController@FilterBranchBranch');
        Route::get('branch/{id}/branchService', 'BranchController@branchService');
        Route::post('getTimeSlot', 'BranchController@getTimeSlot');
        Route::get('offer', 'OfferController@apiIndex');
        Route::post('applyCode', 'OfferController@applyCode');
        Route::get('payment/setting', 'AdminSettingController@apiPaymentData');
        Route::post('available/employee', 'BranchController@getEmployee');
        Route::get('noti/setting', 'AdminSettingController@apiNotiKey');
    });
    
    Route::get('privacy', 'AppUsersController@privacy');
    Route::post('register', 'AppUsersController@store');
    Route::post('verifyMe', 'AppUsersController@verifyMe');
    Route::post('login', 'AppUsersController@login');
    Route::post('forgot', 'AppUsersController@forgot');
    Route::post('forgot/validate', 'AppUsersController@forgotValidate');
});
