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
Route::get('/clear', function() {

    Artisan::call('cache:clear');
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
        //Admin dashboard
        Route::get('admin-dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);
        //Admission student
        Route::get('admin/all-student-admissions', [App\Http\Controllers\Admin\StudentAdmissionController::class, 'all_students']);
        Route::get('admin/edit-student/{id}', [App\Http\Controllers\Admin\StudentAdmissionController::class, 'edit_student']);
        Route::post('admin/update-student/{id}', [App\Http\Controllers\Admin\StudentAdmissionController::class, 'update_student'])->name('admin.update.student');
        Route::get('admin/delete-student', [App\Http\Controllers\Admin\StudentAdmissionController::class, 'delete_student']);
        //Event
        Route::get('admin/add-new-event', [App\Http\Controllers\Admin\EventController::class, 'add_event']);
        Route::post('admin/submit-event',[App\Http\Controllers\Admin\EventController::class,'submit_event'])->name('admin.event.submit');
        Route::get('admin/all-events',[App\Http\Controllers\Admin\EventController::class,'all_events']);
        Route::get('admin/edit-event/{id}',[App\Http\Controllers\Admin\EventController::class,'edit_event']);
        Route::post('admin/update-event/{id}', [App\Http\Controllers\Admin\EventController::class,'update_event'])->name('admin.event.update');
        Route::get('admin/delete-event',[App\Http\Controllers\Admin\EventController::class,'delete_event']);
        Route::get('admin/delete-image',[App\Http\Controllers\Admin\EventController::class,'delete_image']);
        //Event Categories
        Route::get('admin/add-new-category', [App\Http\Controllers\Admin\EventCategoriesController::class, 'add_category']);
        Route::post('admin/category-submit',[App\Http\Controllers\Admin\EventCategoriesController::class,'submit_category'])->name('admin.category.submit');
        Route::get('admin/all-categories', [App\Http\Controllers\Admin\EventCategoriesController::class, 'all_categories']);
        Route::get('admin/edit-category/{id}', [App\Http\Controllers\Admin\EventCategoriesController::class, 'edit_category']);
        Route::post('admin/update-category/{id}', [App\Http\Controllers\Admin\EventCategoriesController::class,'update_category'])->name('admin.category.update');
        Route::get('admin/delete-category', [App\Http\Controllers\Admin\EventCategoriesController::class, 'delete_category']);
        //Post
        Route::get('admin/all-posts', [App\Http\Controllers\Admin\PostController::class, 'all_posts']);
        Route::get('admin/add-new-post', [App\Http\Controllers\Admin\PostController::class, 'add_new_post']);
        Route::post('admin/submit-post', [App\Http\Controllers\Admin\PostController::class, 'submit_post'])->name('admin.submit.post');
        Route::get('admin/edit-post/{id}', [App\Http\Controllers\Admin\PostController::class, 'edit_post']);
        Route::post('admin/update-post/{id}', [App\Http\Controllers\Admin\PostController::class, 'update_post'])->name('admin.update.post');
        Route::get('admin/delete-post', [App\Http\Controllers\Admin\PostController::class, 'delete_post']);
        //Contact us
        Route::get('admin/all-inquiries', [App\Http\Controllers\Admin\ContactUsController::class, 'all_contacts']);
        Route::get('admin/edit-contact/{id}', [App\Http\Controllers\Admin\ContactUsController::class, 'edit_contact']);
        Route::post('admin/update-contact/{id}', [App\Http\Controllers\Admin\ContactUsController::class, 'update_contact'])->name('admin.contact.update');
        Route::get('admin/delete-contact', [App\Http\Controllers\Admin\ContactUsController::class, 'delete_contact']);
        //Profile
        Route::get('admin/edit-profile', [App\Http\Controllers\Admin\ProfileController::class, 'edit_profile']);
        Route::post('admin/update-profile/{id}', [App\Http\Controllers\Admin\ProfileController::class, 'update_profile'])->name('admin.update.profile');
        Route::get('admin/change-password', [App\Http\Controllers\Admin\ProfileController::class, 'change_password']);
        Route::post('admin/submit-change-password', [App\Http\Controllers\Admin\ProfileController::class, 'submit_change_password'])->name('admin.submit.change.password');
        //Notification  
        Route::get('admin/add-new-notification', [App\Http\Controllers\Admin\NotificationController::class, 'add_notification']);
        Route::post('admin/submit-notification', [App\Http\Controllers\Admin\NotificationController::class, 'submit_notification'])->name('admin.notification.submit');
        Route::get('admin/all-notifications', [App\Http\Controllers\Admin\NotificationController::class, 'all_notifications']);
        Route::get('admin/edit-notification/{id}', [App\Http\Controllers\Admin\NotificationController::class, 'edit_notification']);
        Route::post('admin/update-notification/{id}', [App\Http\Controllers\Admin\NotificationController::class, 'update_notification'])->name('admin.notification.update');
        Route::get('admin/delete-notification', [App\Http\Controllers\Admin\NotificationController::class, 'delete_notification']);
        //Testimonial
        Route::get('admin/add-new-testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'add_new_testimonial']);
        Route::post('admin/submit-testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'submit_testimonial'])->name('admin.testimonial.submit');
        Route::get('admin/all-testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'all_testimonials']);
        Route::get('admin/edit-testimonial/{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'edit_testimonial']);
        Route::post('admin/update-testimonial{id}', [App\Http\Controllers\Admin\TestimonialController::class, 'update_testimonial'])->name('admin.testimonial.update');
        Route::get('admin/delete-testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'delete_testimonial']);
    });
});

//Disable Registration
Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
























//custom login
Route::get('admin-login', [App\Http\Controllers\Admin\LoginController::class, 'show_login']);
Route::post('submit-login', [App\Http\Controllers\Admin\LoginController::class, 'login_submit'])->name('submit.login');

