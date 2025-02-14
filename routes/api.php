<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Admission
Route::post('create-student-admission-form', [App\Http\Controllers\Api\StudentAdmissionController::class,'create_admission_form']);
Route::get('/test-whatsapp', [App\Http\Controllers\Api\StudentAdmissionController::class, 'sendWhatsAppMessage']);
//Contact
Route::post('contact-us', [App\Http\Controllers\Api\ContactUsController::class,'contact_us']);
Route::post('student-contact-form', [App\Http\Controllers\Api\StudentContactformController::class,'index']);
Route::post('common-contact-form', [App\Http\Controllers\Api\CommonContactformController::class,'index']);
//Event
Route::get('get-category', [App\Http\Controllers\Api\EventCategoryController::class,'get_event']);
//Event category
Route::get('get-category-event-detail', [App\Http\Controllers\Api\EventCategoryController::class,'get_category_event_detail']);
//Post
Route::get('get-post-details', [App\Http\Controllers\Api\PostController::class,'all_posts']);
//Notification
Route::get('get-notification', [App\Http\Controllers\Api\NotificationController::class,'notification']);
//Testimonial
Route::get('get-testimonial-details', [App\Http\Controllers\Api\TestimonialController::class,'get_testimonials']);

//Contacts form
Route::post('contact-form', [App\Http\Controllers\Api\ContactFormController::class,'submit_contact_form']);
Route::get('all-contacts-list', [App\Http\Controllers\Api\ContactFormController::class,'all_contacts']);