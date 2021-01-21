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

// Route::get('/', function () 
// {
//     return view('welcome');
// });

Auth::routes();

Route::get('/','User\isersController@welcome')->name('welcome');

Route::get('contactForm/','User\ContactUsController@contactForm')->name('contactForm');
Route::post('submitMessage/','User\ContactUsController@submitMessage')->name('submitMessage');

Route::prefix('user')->group(function()
{
    Route::get('cities/{id}','User\searchController@cities')->name('Cities');
    Route::get('projects/{id}','User\searchController@projects')->name('projects');
    Route::get('bedRoom/{id}','User\searchController@bedRoom')->name('bedRoom');
    Route::get('bathRoom/{id}','User\searchController@bathRoom')->name('bathRoom');
    
});

Route::middleware('auth:web')->group(function()
{
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('search','User\searchController@search')->name('search'); // error redirect if not AUTH
    Route::get('allCompanies','User\isersController@allCompanies')->name('allCompanies');
    Route::get('companyDetailes/{id}','User\isersController@companyDetailes')->name('companyDetailes');
    Route::get('projectDetailes/{id}','User\isersController@project_detailes')->name('project_detailes');
    Route::get('govProjects/{id}','User\isersController@govProjects')->name('govProjects');
    Route::get('buildingDetailes/{id}','User\isersController@buildingDetailes')->name('buildingDetailes');
    Route::prefix('rate')->group(function()
    {
        Route::get('/{id}','User\companyRatesController@ratePage')->name('ratePage');
        Route::post('/{id}','User\companyRatesController@rate')->name('rate');
    });
    
});




