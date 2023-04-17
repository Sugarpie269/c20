<?php

use App\Http\Controllers\admin_user_form_controller;
use App\Http\Controllers\user_form_data_controller;
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

Route::get('/nominate-light', function () {
    return view('front/nominate-light');
});
Route::get('/', [user_form_data_controller::class, 'index']);
Route::get('/explore-lights-map', [user_form_data_controller::class, 'all_approved_story']);
Route::get('/form', [user_form_data_controller::class, 'fetchCountry']);
Route::post('/fetch-states', [user_form_data_controller::class, 'fetchState']);
Route::post('/form_save', [user_form_data_controller::class, 'form_save']);
Route::post('/like_save', [user_form_data_controller::class, 'like_save']);
Route::get('/search', [user_form_data_controller::class, 'search']);
Route::post('/search', [user_form_data_controller::class, 'search_result']);
Route::get('/social_share/{social_share_id}', [user_form_data_controller::class, 'social_share']);
Route::get('/light-up/{unique_light_number}',[user_form_data_controller::class, 'light_up']);
Route::get('/light-up-globe',[user_form_data_controller::class, 'light_up_globe']);
// admin
Route::get('/reports', [admin_user_form_controller::class, 'index']);
Route::get('/reports/{from_date}/{to_date}', [admin_user_form_controller::class, 'index']);
Route::get('/reports/getlist', [admin_user_form_controller::class, 'getlist']);
Route::get('/reports/getlist/{from_date}/{to_date}', [admin_user_form_controller::class, 'getlist']);
Route::get('reports/updateStatus/{id}/{status}', [admin_user_form_controller::class, 'updateStatus']);
// Route::get('reports/{from_date}/{to_date}/updateStatus/{id}/{status}', [admin_user_form_controller::class, 'updateStatus']);
