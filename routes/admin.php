<?php

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function()
    { 
        Route::middleware('auth:admin')->prefix('admin')->namespace('Admin')->group(function()
        {
            Route::get('/DashBoard','DashBoardController@DashBoard')->name('admin.DashBoard');
            Route::post('/logout','AuthController@logout')->name('admin.logout');

            // PERMISSIONS
            Route::resource('roles','RoleController');
            Route::resource('admin','AdminController');
            Route::resource('permission','PermissionController');

            // ALL ROUTES
            Route::resource('company','CompaniesController');
            Route::resource('governorate','GovernoratesController');
            Route::resource('city','CitiesController');
            
            // PROJECTS ROUTES
            Route::resource('project','ProjectsController');
            Route::resource('project_images','ProjectImagesController');
            Route::get('project/cities/{id}','ProjectsController@cities')->name('pro.cities');
            Route::post('project/images/{id}','ProjectsController@images')->name('pro.images');

            // BUILDINS ROUTES
            Route::resource('BuildingType','BuildingTypesController');
            Route::resource('Building','BuildingsController');
            Route::post('building/images/{id}','BuildingsController@images')->name('building.images');
            Route::resource('BuildingImage','BuildingImagesController');
            Route::resource('Attribute','AttributesController');
        });

        Route::prefix('admin')->middleware('guest:admin')->namespace('Admin')->group(function()
        {  
            Route::get('/login', 'AuthController@login')->name('admin.log');
            Route::post('/logen', 'AuthController@makeLogin')->name('makeLogin');
        });
    });








