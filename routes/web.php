<?php

use App\Http\Controllers\BusinessTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QueryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use App\Models\BusinessType;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

// Admin Routes
Route::get('/admin', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [AdminController::class, 'login'])->name('admin.loginSubmit');
// ABOUT PAGE
Route::view('about', 'about')->name('about');
Route::view('b2b', 'b2b')->name('b2b');

Route::middleware('auth.admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/queries', [QueryController::class, 'showQueries'])->name('admin.showQueries');
    Route::get('admin/queries/forward/{query_id}', [QueryController::class, 'forwardQuery'])->name('admin.forwardQuery');
    Route::delete('admin/queries/{query_id}', [QueryController::class, 'destroy'])->name('admin.deleteQuery');
    Route::get('admin/vendors', [AdminController::class, 'showVendors'])->name('admin.showVendors');
    Route::get('admin/add-vendors-bulk', [AdminController::class, 'addBulkVendors'])->name('admin.addVendors.bulk');
    Route::post('admin/add-vendors-bulk', [AdminController::class, 'storeBulkVendors'])->name('admin.storeVendors.bulk');
    Route::get('admin/vendor/verify/{vendor_id}', [AdminController::class, 'verifyVendor'])->name('admin.verifyVendor');
    Route::get('admin/vendor/reject/{vendor_id}', [AdminController::class, 'rejectVendor'])->name('admin.rejectVendor');
    Route::get('admin/change-password', [AdminController::class, 'changePassword'])->name('admin.changePassword');
    Route::post('admin/change-password', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');

    Route::get('admin/activity-logs', [AdminController::class, 'activityLogs'])->name('admin.activity');
    Route::get('admin/authentication-logs', [AdminController::class, 'AuthenticationLogs'])->name('admin.auth.logs');

    // categories

    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/category/add', [CategoryController::class, 'create'])->name('admin.category.add');
    Route::post('/admin/category/add', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/category/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    // faq
    Route::get('/admin/faq', [FaqController::class, 'index'])->name('admin.faq');
    Route::get('/admin/faq/add', [FaqController::class, 'create'])->name('admin.faq.add');
    Route::post('/admin/faq/add', [FaqController::class, 'store'])->name('admin.faq.submit');
    Route::get('/admin/faq/edit/{id}', [FaqController::class, 'edit'])->name('admin.faq.edit');
    Route::post('/admin/faq/edit/{id}', [FaqController::class, 'update'])->name('admin.faq.update');
    Route::delete('/admin/faq/delete/{id}', [FaqController::class, 'destroy'])->name('admin.faq.delete');

    //Images Library
    Route::get('/admin/images', [AdminController::class, 'showImages'])->name('admin.images.show');
    Route::get('/admin/images/add', [AdminController::class, 'createImage'])->name('admin.image.create');
    Route::post('/admin/images/add', [AdminController::class, 'storeImage'])->name('admin.image.store');
    Route::delete('/admin/images/delete/{id}', [AdminController::class, 'deleteImage'])->name('admin.image.delete');

    Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('admin/contact-us-queries', [AdminController::class, 'ContactUsQueries'])->name('admin.contactUs');
    Route::get('admin/contact-us-queries/{slug}', [AdminController::class, 'AnswerContactUsQuery'])->name('admin.contactQuery.answer');

    // BusinessType 

    Route::get('/admin/business-types', [BusinessTypeController::class, 'index'])->name('business-types.index');
    Route::post('/admin/business-types', [BusinessTypeController::class, 'store'])->name('business-types.store');
    Route::put('/admin/business-types/{businessType}', [BusinessTypeController::class, 'update'])->name('business-types.update');
    Route::delete('/admin/business-types/{businessType}', [BusinessTypeController::class, 'destroy'])->name('business-types.destroy');




});

// Vendor Routes
Route::post('vendor/send-otp', [VendorController::class, 'sendOtp'])->name('sendotp');
Route::post('vendor/verify-otp', [VendorController::class, 'verifyOtp'])->name('verifyotp');
Route::get('registration-form', [VendorController::class, 'showRegistrationForm'])->name('showregistrationform');
Route::post('vendor/register', [VendorController::class, 'storeVendor'])->name('storevender');
Route::get('vendor/login', [VendorController::class, 'login'])->name('login');
Route::post('vendor/login', [VendorController::class, 'SendLoginOtp'])->name('vendor.login');
Route::post('vendor/store-login', [VendorController::class, 'loginStore'])->name('vendor.login.store');

Route::middleware('auth.vendor')->group(function () {
    Route::get('vendor/dashboard', [VendorController::class, 'dashboard'])->name('venderdashboard');
    Route::get('vendor/queries/{vendor_id}', [QueryController::class, 'showVendorQueries'])->name('vendor.showQueries');
    Route::get('vendor/services/{vendor_id}', [VendorController::class, 'addServices'])->name('vendor.addServices');
    Route::get('vendor/bulk-services/{vendor_id}', [ServiceController::class, 'bulkServices'])->name('vendor.bulkServices');
    Route::post('vendor/services/{vendor_id}', [ServiceController::class, 'store'])->name('vendor.saveServices');
    Route::post('vendor/bulkservices/{vendor_id}', [ServiceController::class, 'storeBulk'])->name('vendor.saveBulkServices');
    Route::get('vendor/products/{vendor_id}', [VendorController::class, 'addProduct'])->name('vendor.addProduct');
    Route::get('vendor/profile', [VendorController::class, 'showProfile'])->name('vendor.profile');
    Route::post('vendor/update-profile/{id}', [VendorController::class, 'updateProfile'])->name('updatevendorprofile');
    Route::post('vendor/logout', [VendorController::class, 'logout'])->name('vendor.logout');

    Route::get('vendor/services/list/{vendor_id}', [ServiceController::class, 'index'])->name('vendor.viewServices');
    Route::get('vendor/services/edit/{service_id}/{vendor_id}', [ServiceController::class, 'edit'])->name('vendor.editServices');
    Route::post('vendor/services/edit/{service_id}', [ServiceController::class, 'update'])->name('vendor.updateServices');
    Route::get('vendor/services/edit/{service_id}', [ServiceController::class, 'destroy'])->name('vendor.deleteServices');
});

// User Routes
Route::get('user/registration-form', [UserController::class, 'showRegistrationForm'])->name('user.register');
Route::post('user/send-reg-otp', [UserController::class, 'sendRegOtp'])->name('user.sendRegOtp');
Route::post('user/register', [UserController::class, 'store'])->name('storeUser');
Route::get('user/login', [UserController::class, 'showLoginForm'])->name('user.login');
Route::post('user/send-otp', [UserController::class, 'sendLoginOtp'])->name('user.sendOtp');
Route::post('user/login', [UserController::class, 'login'])->name('user.loginSubmit');
Route::post('user/contact-query', [UserController::class, 'storeContactQuery'])->name('admin.contact.query');
Route::post('user/query/create', [QueryController::class, 'createQuery'])->name('createQuery');

Route::middleware('auth.user')->group(function () {
    Route::get('user/dashboard', [UserController::class, 'dashboard'])->middleware('history')->name('user.dashboard');
    Route::get('user/queries/{user_id}', [QueryController::class, 'showUserQueries'])->name('showUserQueries');
    Route::delete('user/query/{query_id}', [QueryController::class, 'deleteUserQuery'])->name('user.delete.query');
    Route::post('user/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('user/profile', [UserController::class, 'showProfile'])->name('userProfile');
    Route::post('user/update-profile/{id}', [UserController::class, 'updateProfile'])->name('updateUserProfile');
});

// Home Pages 
Route::get('/', [HomeController::class, 'index'])->name('home.page');
Route::get('/quates', [HomeController::class, 'quates']);
Route::get('/quates/{id}', [HomeController::class, 'selectedQuates'])->name('quates');
Route::get('/business-and-services', [HomeController::class, 'businessAndServises'])->name('businessandservises');

Route::get('/list-your-bussiness', [HomeController::class, 'listyourbussiness']);
Route::get('/ads', [HomeController::class, 'ads']);
Route::get('/leads', [HomeController::class, 'leads']);

Route::get('/vendor-services/{id}', [HomeController::class, 'venderServices'])->name('venderServices');
Route::get('/vendors/{id}', [HomeController::class, 'venders'])->name('venders');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.submit');
Route::post('/search', [HomeController::class, 'search'])->name('search');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/terms-and-conditions', [HomeController::class, 't_and_c'])->name('termsAndConditions');
