<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";
});

Route::get('/', function () {
    return view('auth/login');
});



//Admin Dashboard
Route::group(['middleware' => 'auth'], function () {
 Route::group(['middleware' => 'Admin'], function () {
  Route::get('admin-dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);

 //Start Event Categories

 //show event categories
Route::get('/add-categories', [App\Http\Controllers\Admin\EventCategoriesController::class, 'show_categories']);
Route::post('/categories-submit',[App\Http\Controllers\Admin\EventCategoriesController::class,'add_categories'])->name('categories.submit');
Route::get('/all-categories', [App\Http\Controllers\Admin\EventCategoriesController::class, 'all_categories']);
Route::get('/edit-categories/{id}', [App\Http\Controllers\Admin\EventCategoriesController::class, 'edit_categories']);
Route::post('/update-categories/{id}', [App\Http\Controllers\Admin\EventCategoriesController::class,'update_categories'])->name('categories.update');
Route::get('/delete-categories/{id}', [App\Http\Controllers\Admin\EventCategoriesController::class, 'delete_categories']);
//End Event Categories

//Start Event
Route::get('/add-events', [App\Http\Controllers\Admin\EventController::class, 'show_event']);
Route::post('/events-submit',[App\Http\Controllers\Admin\EventController::class,'add_event'])->name('events.submit');
Route::get('/all-events',[App\Http\Controllers\Admin\EventController::class,'all_event']);
Route::get('/edit-events/{id}',[App\Http\Controllers\Admin\EventController::class,'edit_events']);
Route::post('/update-events/{id}', [App\Http\Controllers\Admin\EventController::class,'update_events'])->name('events.update');

Route::get('/delete-events/{id}',[App\Http\Controllers\Admin\EventController::class,'delete_events']);
Route::get('/delete-images/{id}',[App\Http\Controllers\Admin\EventController::class,'delete_image']);

});
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//custom login
Route::get('admin-login', [App\Http\Controllers\Admin\LoginController::class, 'show_login']);
Route::post('submit-login', [App\Http\Controllers\Admin\LoginController::class, 'login_submit'])->name('submit.login');

