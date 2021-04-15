<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
      ->namespace('Admin')
      ->group(function(){

/**
 * Routes Permission
 */
Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
Route::resource('permissions', 'ACL\PermissionController');
/**
 * Routes Profile
 */
Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
Route::resource('profiles', 'ACL\ProfileController');

/**
 * Routes DetailPlans
 */
Route::resource('details', 'DetailPlanController');

        /**
 * Routes Plans
 */
Route::resource('plans', 'PlanController');
/**
 * Route AdminLte
 */
Route::get('/', 'DashboardController@index')->name('admin.index');

});



Route::get('/', function () {
    return view('welcome');
});
