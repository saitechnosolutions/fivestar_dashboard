<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AnniversaryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BannerimgController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserlogController;

use App\Http\Controllers\YoutubeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExamNotificationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\priceEnquiry;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserSignupController;

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

Route::get('/', function () {
    return view('pages.login');
});


Route::view('signup','pages.signup')->middleware('guest');
Route::post('store',[AdminRegisterController::class,'store']);
// Route::view('dashboard','pages.dashboard');

Route::view('login','pages.login')->middleware('guest');
Route::post('authenticate',[LoginController::class,'authenticate']);

Route::get('logout',[LoginController::class,'logout']);


// Route::view('packages','pages.packages');
// Route::post('storepackages',[PackageController::class,'store']);

Route::resource('banner',BannerimgController::class);

// Route::post('packages',PackageController::class);




Route::get('users',[AdminRegisterController::class,'index']);





Route::resource('youtubevideo',YoutubeController::class);


Route::resource('testimonials',TestimonialController::class);

Route::resource('machines',MachineController::class);
Route::resource('products',ProductController::class);
Route::post('savemachine',[MachineController::class,'savemachine']);
Route::post('saveproduct',[ProductController::class,'saveproduct']);
Route::resource('gallery',GalleryController::class);
Route::post('savegallery',[GalleryController::class,'savegallery']);
Route::resource('blog',BlogController::class);
Route::post('saveblog',[BlogController::class,'saveblog']);

Route::resource('priceenquiry',priceEnquiry::class);
Route::resource('usersignup',UserSignupController::class);
Route::resource('anniversarylogo',AnniversaryController::class);

Route::post('anniversarysubmit',[AnniversaryController::class,'anniversarysubmit']);

Route::post('updateproduct',[ProductController::class,'updateproduct']);

Route::post('updatemachine',[MachineController::class,'updatemachine']);

Route::resource('events',EventController::class);
Route::post('saveEvent',[EventController::class,'saveEvent']);

Route::resource('dashboard',DashboardController::class);

Route::resource('material',MaterialController::class);

Route::resource('heroimage',HeroController::class);

Route::get('dashboard',[DashboardController::class,'totalProfiles']);

Route::POST('savematerial',[MaterialController::class,'savematerial']);

Route::POST('materialupdate',[MaterialController::class,'materialupdate']);

Route::POST('updateheroimage',[HeroController::class,'updateheroimage']);

Route::resource('about',AboutController::class);
Route::POST('updateContent',[AboutController::class,'updateContent']);
Route::POST('remove',[ProductController::class,'remove']);


///


Route::resource('exam-notification',ExamNotificationController::class);
Route::resource('course',CourseController::class);
Route::GET('courseedit/{id}',[CourseController::class,'courseedit']);
Route::POST('savecourse',[CourseController::class,'savecourse']);
Route::POST('savemachine',[ExamNotificationController::class,'savemachine']);

Route::POST('updatecourse',[CourseController::class,'updatecourse']);
Route::GET('coursedelete/{id}',[CourseController::class,'coursedelete']);
Route::GET('notificationedit/{id}',[ExamNotificationController::class,'notificationedit']);
Route::POST('updatenotification',[ExamNotificationController::class,'updatenotification']);
Route::GET('examdelete/{id}',[ExamNotificationController::class,'examdelete']);
Route::POST('updatetestimonials',[TestimonialController::class,'updatetestimonials']);
Route::POST('eventupdate',[EventController::class,'eventupdate']);
Route::POST('blogupdate',[BlogController::class,'blogupdate']);
