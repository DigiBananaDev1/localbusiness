<?php

use App\Http\Controllers\BusinessTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
Route::view('productfgh', 'product')->name('product');
Route::view('productpage', 'productpage')->name('productpage');
Route::view('productcat', 'productcat')->name('productcat');
Route::view('viewall', 'viewall')->name('viewall');

Route::middleware('auth.admin', 'history')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/queries', [QueryController::class, 'showQueries'])->name('admin.showQueries');
    Route::get('admin/queries/forward/{query_id}', [QueryController::class, 'forwardQuery'])->name('admin.forwardQuery');
    Route::delete('admin/queries/{query_id}', [QueryController::class, 'destroy'])->name('admin.deleteQuery');
    Route::get('admin/vendors/show', [AdminController::class, 'showVendors'])->name('admin.showVendors');
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

    Route::get('/admin/categories/{id}/children', [CategoryController::class, 'children'])->name('children.category');

    // User Routes
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users/store', [AdminController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/users/update/{id}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/delete/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    // Route::get('/admin/users/{id}/change-password', [AdminController::class,'changePassword'])->name('admin.users.changePassword');
    Route::post('/admin/users/{id}/change-password', [AdminController::class, 'UserupdatePassword'])->name('admin.users.updatePassword');


    // Vendor Routes
    Route::get('/admin/vendors', [AdminController::class, 'vendorindex'])->name('admin.vendors');
    Route::get('/admin/vendors/create', [AdminController::class, 'vendorcreate'])->name('admin.vendors.create');
    Route::post('/admin/vendors/store', [AdminController::class, 'vendorstore'])->name('admin.vendors.store');
    Route::get('/admin/vendors/edit/{id}', [AdminController::class, 'vendoredit'])->name('admin.vendors.edit');
    Route::post('/admin/vendors/update/{id}', [AdminController::class, 'vendorupdate'])->name('admin.vendors.update');
    Route::delete('/admin/vendors/delete/{id}', [AdminController::class, 'vendordestroy'])->name('admin.vendors.destroy');


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



    //  Products 
    Route::get('vendor/products/list/{vendor_id}', [ProductController::class, 'index'])->name('vendor.viewproducts');
    Route::get('vendor/products/create/{vendor_id}', [ProductController::class, 'create'])->name('vendor.createproducts');
    Route::post('vendor/products/create/{vendor_id}', [ProductController::class, 'store'])->name('vendor.storeproducts');
    Route::get('vendor/products/edit/{product_id}/{vendor_id}', [ProductController::class, 'edit'])->name('vendor.editproducts');
    Route::post('vendor/products/edit/{product_id}/{vendor_id}', [ProductController::class, 'update'])->name('vendor.updateproducts');
    Route::get('vendor/products/delete/{vendor_id}/{product_id}', [ProductController::class, 'destroy'])->name('vendor.deleteproducts');
    Route::post('/vendor/products/{vendor}/multiple', [ProductController::class, 'storeMultiple'])->name('vendor.storeMultipleProducts');

    Route::delete('/vendor/gallery/{id}', [ProductController::class, 'deleteGallery'])->name('vendor.gallery.delete');






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

Route::get('/type/{type}', [HomeController::class, 'vendorsByType'])->name('vendors.byType');

Route::get('categories/{slug}', [HomeController::class, 'category'])->name('category');
// routes/web.php

Route::get('/category/{slug}', [HomeController::class, 'productsByCategory'])->name('productsByCategory');
Route::get('/product/{slug}', [HomeController::class, 'productdetails'])->name('productdetails');


