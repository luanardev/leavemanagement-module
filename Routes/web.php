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

Route::prefix('leavemanagement')->group(function() {
    Route::get('/', 'LeaveManagementController@index')->name('leavemanagement.home');


    Route::prefix('client')->group(function(){
        Route::get('/', function(){
            return "Client Panel";
        });
        Route::get('/', 'LeaveManagementController@create')->name('leavemanagement.create');
        Route::post('apply', 'LeaveManagementController@store')->name('leavemanagement.apply');
    });

    Route::prefix('admin')->group(function(){
        Route::get('/', function(){
            return "Admin Panel";
        });
    });


});
