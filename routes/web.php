<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SpotController;
use App\Http\Controllers\AdminSpotController;
use App\Http\Controllers\SpotCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManageController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/cost_calculator', [HomeController::class, 'cost_calculator'])->name('cost_calculator');
Route::get('/plans', [HomeController::class, 'plans'])->name('plans');
Route::get('/plan_creator', [HomeController::class, 'plan_creator'])->name('plan_creator');
Route::get('/plan_details', [HomeController::class, 'plan_details'])->name('plan_details');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');

// Tourist Spots (Frontend)
Route::get('/spots', [SpotController::class, 'index'])->name('spots.index');
Route::get('/spots/{spot:slug}', [SpotController::class, 'show'])->name('spot_details');

/*
|--------------------------------------------------------------------------
| User Authentication
|--------------------------------------------------------------------------
*/

// user auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login', [UserController::class, 'login'])->name('user.login.submit');

    Route::get('/register', [UserController::class, 'showRegisterForm'])->name('user.register');
    Route::post('/register', [UserController::class, 'register'])->name('user.register.submit');
});

// Authenticated user routes
Route::middleware('auth')->group(function () {
   // Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::post('/user/logout', [UserController::class, 'logout'])->name('user.logout');

    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::put('/user/profile/password', [UserController::class, 'updatePassword'])->name('user.profile.password');
    Route::put('/user/profile/avatar', [UserController::class, 'updateAvatar'])->name('user.profile.avatar');

    Route::get('/user/activities', [UserController::class, 'activities'])->name('user.activities');
    Route::get('/user/saved', [UserController::class, 'saved'])->name('user.saved');
});

/*
|--------------------------------------------------------------------------
| Admin Authentication
|--------------------------------------------------------------------------
*/

// Admin login page
Route::get('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login')
    ->middleware('guest');

// Admin login submit
Route::post('/admin', [AdminController::class, 'AdminLogin'])
    ->name('admin.login.success');

// Admin logout
Route::post('/logout', [AdminController::class, 'AdminLogout'])
    ->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Protected Routes (Only Admin Can Access)
|--------------------------------------------------------------------------
*/

Route::middleware(['admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Profile
    Route::get('/profile', [AdminController::class, 'profileSettings'])->name('admin.profile');
    Route::put('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::put('/profile/password', [AdminController::class, 'updatePassword'])->name('admin.profile.password');
    Route::put('/profile/avatar', [AdminController::class, 'updateAvatar'])->name('admin.profile.avatar');

    /*
    | Admin Spot Management
    */
    Route::get('/admin/spots', [AdminSpotController::class, 'index'])->name('admin.spots.index');
    Route::get('/admin/spots/create', [AdminSpotController::class, 'create'])->name('admin.spots.create');
    Route::post('/admin/spots', [AdminSpotController::class, 'store'])->name('admin.spots.store');
    Route::get('/admin/spots/{spot}/edit', [AdminSpotController::class, 'edit'])->name('admin.spots.edit');
    Route::put('/admin/spots/{spot}', [AdminSpotController::class, 'update'])->name('admin.spots.update');
    Route::delete('/admin/spots/{spot}', [AdminSpotController::class, 'destroy'])->name('admin.spots.destroy');

    /*
    | Admin Spot Category Management
    */
    Route::get('/admin/spot-categories', [SpotCategoryController::class, 'index'])
        ->name('admin.spotCategories.index');
    Route::post('/admin/spot-categories', [SpotCategoryController::class, 'store'])
        ->name('admin.spotCategories.store');
    Route::put('/admin/spot-categories/{id}', [SpotCategoryController::class, 'update'])
        ->name('admin.spotCategories.update');
    Route::delete('/admin/spot-categories/{category}', [SpotCategoryController::class, 'destroy'])
        ->name('admin.spotCategories.destroy');
    Route::post('/admin/spot-categories/status/{id}', [SpotCategoryController::class, 'statusUpdate'])
        ->name('admin.spotCategories.status');

    /*
    | Admin User Management
    */

    Route::get('/admin/users', [UserManageController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/status/{id}', [UserManageController::class, 'toggleStatus'])->name('admin.users.status');

});
