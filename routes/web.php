<?php
use App\Http\Controllers\admin\AboutUsController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AmenityController;
use App\Http\Controllers\admin\ContactUsController;
use App\Http\Controllers\admin\CustomAuthController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\ImageController;
use App\Http\Controllers\admin\InquiryController;
use App\Http\Controllers\admin\JobApplyController;
use App\Http\Controllers\admin\JobController;
use App\Http\Controllers\admin\LinkController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\LocationLogoController;
use App\Http\Controllers\admin\PlanController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\serviceLogoController;
use App\Http\Controllers\admin\ServicePlanController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\StaticPageController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\WhyController;
use App\Http\Controllers\UiAjaxAuthController;
use App\Http\Controllers\website\UiAboutUsController;
use App\Http\Controllers\website\UiCareersController;
use App\Http\Controllers\website\UiContactUsController;
use App\Http\Controllers\website\UiFaqsController;
use App\Http\Controllers\website\UiHomePageController;
use App\Http\Controllers\website\UiInquiryController;
use App\Http\Controllers\website\UiJobApplyController;
use App\Http\Controllers\website\UiLocationsController;
use App\Http\Controllers\website\UiServicesController;
use App\Http\Controllers\website\UiSpageController;
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

Route::get('/coLogin',[UiAjaxAuthController::class ,'login']);
Route::Post('/coLogin',[UiAjaxAuthController::class ,'authenticate'])->name('ajax.auth.login');

Route::get('/coRegister',[UiAjaxAuthController::class ,'registration']);
Route::Post('/coRegister',[UiAjaxAuthController::class ,'register'])->name('ajax.auth.register');

Route::get('/', [UiHomePageController::class,'index'])->name('homeHome');
Route::get('/about-us',[UiAboutUsController::class,'index']);
Route::get('/careers', [UiCareersController::class,'index']);
Route::get('/faqs',[UiFaqsController::class,'index']);
//________________________________________________________________________________________________
Route::get('/contact-us', [UiContactUsController::class,'index'] );
Route::post('/contact-us', [UiContactUsController::class,'store'] );
//________________________________________________________________________________________________
Route::get('/job-apply',[UiJobApplyController::class,'index'] );
Route::post('/job-apply',[UiJobApplyController::class,'store'] );
//________________________________________________________________________________________________
Route::get('/make-an-inquiry',[UiInquiryController::class,'index']);
Route::post('/make-an-inquiry',[UiInquiryController::class,'store']);
//________________________________________________________________________________________________
Route::get('/services', [UiServicesController::class,'index']);
//________________________________________________________________________________________________
Route::get('/locations',  [UiLocationsController::class,'locations']);
Route::get('/locations/{id}', [UiLocationsController::class,'location']);
//________________________________________________________________________________________________
Route::get('/privacy-policy',[UiSpageController::class,'privacy']);
Route::get('/terms-and-conditions',[UiSpageController::class,'terms']);
//________________________________________________________________________________________________
Route::resource('/admins', AdminController::class)->middleware('admin');
Route::get('/view/profile',[AdminController::class ,'showProfile'])->middleware('admin');
Route::get('/edit/profile',[AdminController::class,'editProfile'])->middleware('admin');
Route::get('/registration',[CustomAuthController::class,'registration'])->middleware('logged');
Route::get('/login',[CustomAuthController::class,'login'])->middleware('logged');
Route::get('/logout',[CustomAuthController::class,'logout']);
Route::post('/registration',[CustomAuthController::class,'register'])->name('registration');
Route::post('/login',[CustomAuthController::class,'authenticate'])->name('login');
Route::get('/password/forget',[CustomAuthController::class,'forgetForm'])->name('forgetForm')->middleware('logged');
Route::post('/password/forget',[CustomAuthController::class,'forgetLink'])->name('forgetLink');
Route::get('/password/reset/{token}',[CustomAuthController::class,'resetForm'])->name('resetForm')->middleware('logged');
Route::post('/password/reset',[CustomAuthController::class,'resetPassword'])->name('resetPassword');
//________________________________________________________________________________________________
Route::prefix('admin')->group(function () {
Route::resource('/about_us', AboutUsController::class)->middleware('admin')->except('create','store','delete');
Route::resource('/static_page', StaticPageController::class)->middleware('admin')->except('create', 'store', 'delete');
Route::resource('/job', JobController::class)->middleware('admin');
Route::resource('/faqs', FaqController::class)->middleware('admin');
Route::resource('/slider', SliderController::class)->middleware('admin')->except('create', 'store', 'delete');
Route::resource('/why', WhyController::class)->middleware('admin')->except('create', 'store', 'delete');
Route::resource('/link', LinkController::class)->middleware('admin');
Route::resource('/amenity', AmenityController::class)->middleware('admin');
Route::resource('/testimonial', TestimonialController::class)->middleware('admin');
//________________________________________________________________________________________________
Route::resource('/contact_us', ContactUsController::class)->middleware('admin')->except('edit', 'update','create','store');
Route::get('/contact_us/{id}/reply ', [ContactUsController::class, 'reply'])->middleware('admin');
Route::post('/contact_us/reply', [ContactUsController::class, 'replyEmail'])->middleware('admin');
//________________________________________________________________________________________________
Route::resource('/job_apply', JobApplyController::class)->middleware('admin')->except('edit', 'update','create','store');
Route::get('/job_apply/{id}/reply ', [JobApplyController::class, 'reply'])->middleware('admin');
Route::post('/job_apply/reply', [JobApplyController::class, 'replyEmail'])->middleware('admin');
//________________________________________________________________________________________________
Route::resource('/location', LocationController::class)->middleware('admin');
Route::resource('/location_logo', LocationLogoController::class)->middleware('admin');
Route::resource('/image', ImageController::class)->middleware('admin');
//________________________________________________________________________________________________
Route::resource('/plan', PlanController::class)->middleware('admin');
//________________________________________________________________________________________________
Route::resource('/service', ServiceController::class)->middleware('admin');
Route::resource('/service_logo', ServiceLogoController::class)->middleware('admin');
Route::resource('/service_plan', ServicePlanController::class)->middleware('admin');
//________________________________________________________________________________________________
Route::resource('/inquiry', InquiryController::class)->middleware('admin')->except('edit', 'update','create','store');
Route::get('/inquiry/{id}/reply ', [InquiryController::class, 'reply'])->middleware('admin');
Route::post('/inquiry/reply', [InquiryController::class, 'replyEmail'])->middleware('admin');
});
//________________________________________________________________________________________________
