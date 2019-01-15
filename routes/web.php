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
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/admin/create_staff', 'AdminController@create_staff');
Route::get('/admin/create_staff_form', 'AdminController@create_staff_form');
Route::get('/bill', 'BillBalanceController@bill_list');
Route::get('/lock/{id}', 'StaffController@lock');
Route::get('/lock_topup/{id}', 'StaffController@lock_topup');
Route::get('/reactive/{id}', 'StaffController@active');
Route::get('/reactive_topup/{id}', 'StaffController@active_topup');
Route::post('/bill_add', 'BillBalanceController@Bill_list_add');
Route::get('/all_staff', 'StaffController@show_staff');
Route::get('/all_staff_topup', 'StaffController@show_staff_topup');
Route::post('/delete_topup_bill', 'BillBalanceController@delete_topup_bill');
Route::get('logout','Auth\LoginController@logout');