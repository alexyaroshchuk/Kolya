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

/*Route::get('/', function () {
    return view('welcom');
});*/

Route::get('/', 'IndexController@index');


Route::get('product/{id}', 'IndexController@show') -> name('productShow');


Route::group(['prefix'=>'client','middleware'=>['web','auth']], function() {
	
Route::get('page/Orders', 'Client\AddController@showOrders')->name('showOrders');
Route::post('page/Orders', 'Client\AddController@addOrder')->name('storeOrder');

Route::get('page/Order/{id}', 'Client\AddController@showOrderDetals') -> name('orderDetalsShow');
 	
Route::get('page/Add/Order/Detals/{id}', 'Client\AddController@addOrderDetals')-> name('addOrderDetals');
Route::post('page/Add/Order/Detals/{id}', 'Client\AddController@storeOrderDetals')->name('storeOrderDetals');

Route::get('page/profile', 'Client\AddController@showProfile')-> name('showProfile');
Route::get('page/updata/profile', 'Client\AddController@updataProfile')-> name('updataProfile');
Route::post('page/updata/profile', 'Client\AddController@storeProfile')-> name('storeProfile');


});



Route::group(['prefix'=>'seller','middleware'=>['web','auth']], function() {	
	
Route::get('page/Sales', 'Seller\AddController@showSales')->name('showSales');
Route::post('page/Sales', 'Seller\AddController@addSale')->name('storeSale');

Route::get('page/Sale/{id}', 'Seller\AddController@showSaleDetals') -> name('saleDetalsShow');

Route::get('page/Add/Sale/Detals/{id}', 'Seller\AddController@addSaleDetals')-> name('addSaleDetals');
Route::post('page/Add/Sale/Detals/{id}', 'Seller\AddController@storeSaleDetals')->name('storeSaleDetals');

});


Route::group(['prefix'=>'picker','middleware'=>['web','auth']], function() {	
	
Route::get('page/Waybills', 'Picker\AddController@showWaybills')->name('showWaybills');
Route::post('page/Waybills', 'Picker\AddController@addWaybill')->name('storeWaybill');

Route::get('page/Waybill/{id}', 'Picker\AddController@showWaybillDetals') -> name('waybillDetalsShow');

Route::get('page/Add/Waybill/Detals/{id}', 'Picker\AddController@addWaybillDetals')-> name('addWaybillDetals');
Route::post('page/Add/Waybill/Detals/{id}', 'Picker\AddController@storeWaybillDetals')->name('storeWaybillDetals');

});


Route::group(['prefix'=>'director','middleware'=>['web','auth']], function() {	
	
Route::get('page/Branches', 'Director\BranchController@showBranches')->name('showBranches');
Route::get('page/Add/Branch', 'Director\BranchController@addBranch')->name('addBranch');
Route::post('page/Add/Branch', 'Director\BranchController@storeBranch')->name('storeBranch');

Route::get('page/Update/Branch/{id}', 'Director\BranchController@updateBranch')->name('updateBranch');
Route::post('page/Update/Branch', 'Director\BranchController@storeUpdateBranch')->name('storeUpdateBranch');


Route::get('page/Staffs', 'Director\StaffController@showStaffs')->name('showStaffs');
Route::get('page/Add/Staff', 'Director\StaffController@addStaff')->name('addStaff');
Route::post('page/Add/Staff', 'Director\StaffController@storeStaff')->name('storeStaff');

Route::get('page/Staff/Profile/{id}', 'Director\StaffController@showProfile')->name('showStaffProfile');
Route::get('page/Staff/Update/Profile/{id}', 'Director\StaffController@updateProfile')->name('updateStaffProfile');
Route::post('page/Staff/Update/Profile', 'Director\StaffController@storeUpdateStaff')->name('storeUpdateStaff');

Route::get('page/Add/Account/Staff/{id}', 'Director\StaffController@addStaffAccount')->name('addStaffAccount');
Route::post('page/Add/Account/Staff', 'Director\StaffController@storeStaffAccount')->name('storeStaffAccount');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
