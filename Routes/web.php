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
    Route::get('/', 'HomeController@index')->name('leavemanagement.home');


    Route::prefix('client')->group(function(){
        Route::get('/', function(){
            return "Client Panel";
        });
        Route::get('/', 'LeaveController@create')->name('leavemanagement.create');
        Route::post('apply', 'LeaveController@store')->name('leavemanagement.apply');
        Route::get('/view','LeaveController@viewApplication' )->name('leavemanagement.client.pending.view');
        
        
    });

    Route::prefix('admin')->group(function(){
        Route::get('/','LeaveController@getPending' )->name('leavemanagement.admin.pending');
        Route::get('/view','LeaveController@viewPending' )->name('leavemanagement.admin.pending.view');
        Route::get('/view','LeaveController@history' )->name('leave.admin.history');
        Route::post('/approve','LeaveController@approve')->name('leavemanagement.admin.approve');
        Route::post('/disapprove','LeaveController@disapprove' )->name('leavemanagement.admin.disapprove');
    });


});
