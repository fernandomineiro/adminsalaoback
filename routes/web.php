<?php

use Illuminate\Support\Facades\Artisan;
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
Auth::routes();
Route::post('/active', 'Admin\AdminSettingController@active')->middleware('web');
Route::post('saveAdminData', 'Admin\AdminSettingController@setup');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','coder']], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
Route::group(['middleware' => ['auth', 'coder']], function () {

	Route::group(['namespace' => 'Admin'], function () {

		Route::resources([
			'roles' => 'RolesController',
			'users' => 'UsersController',
			'categories' => 'CategoryController',
			'subcategories' => 'SubCategoryController',
			'branch' => 'BranchController',
			'offers' => 'OfferController',
			'notification' => 'StaticNotiController',
			'employee' => 'EmployeeInfoController',
		]);
		Route::get('review', 'ReviewController@index')->name('review.index');
		Route::get('review/{id}', 'ReviewController@delete')->name('review.delete');
		Route::get('pp', 'AdminSettingController@pp')->name('pp');
		Route::post('pp/update', 'AdminSettingController@updatePP')->name('pp.update');
		// module
		Route::post('twilio/update', 'TwilioController@updateTwilio')->name('twilio.update');
		Route::post('onesignal', 'StaticNotiController@updateOnesignl')->name('onesignal.update');
		Route::post('base', 'AdminSettingController@updateBase')->name('base.update');
		Route::post('stripe', 'StripeController@updateStripe')->name('stripe.update');
		Route::post('paypal', 'PaypalController@updatePaypal')->name('paypal.update');
		Route::post('razor', 'RazorController@updatePaypal')->name('razor.update');
		// module
		Route::get('report', 'BranchController@reportIndex')->name('report.index');
		Route::post('report', 'BranchController@createReport')->name('report.create');
		Route::get('custom/notification', 'StaticNotiController@customIndex')->name('custom.index');
		Route::post('custom/notification/user', 'StaticNotiController@customUser')->name('custom.user');

		Route::get('setting', 'AdminSettingController@index')->name('setting.index');
		Route::post('setting/basic', 'AdminSettingController@basicUpdate')->name('setting.basic');
	});
});

Route::get('appuser', 'AppUsersController@index')->name('appuser.index');
Route::post('appuser/status/{id}', 'AppUsersController@changeStatus')->name('appuser.statusChange');

Route::get('booking', 'BookingMasterController@index')->name('booking.index');
Route::get('booking/{id}', 'BookingMasterController@show')->name('booking.show');
Route::get('booking/{id}/{status}', 'BookingMasterController@statusChange')->name('booking.status');
Route::get('payment/{id}', 'BookingMasterController@collectPayment')->name('booking.paymentstatus');
