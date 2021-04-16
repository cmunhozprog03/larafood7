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
//Route::resource('details', 'DetailPlanController')->names('delails.plan');
Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');

Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

        /**
 * Routes Plans
 */
Route::any('plans/search', 'PlanController@search')->name('plans.search');
Route::resource('plans', 'PlanController');
/**
 * Route AdminLte
 */
Route::get('/', 'DashboardController@index')->name('admin.index');

});



Route::get('/', function () {
    return view('welcome');
});
