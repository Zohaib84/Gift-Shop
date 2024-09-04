<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

// Public Routes
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('product_details/{id}', [HomeController::class, 'product_details']);
Route::get('shop', [HomeController::class, 'shop']);
Route::get('why', [HomeController::class, 'why']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('testimonial', [HomeController::class, 'testimonial']);

// Dashboard Route
Route::get('/dashboard', [HomeController::class, 'login_home'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Cart and Orders Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('add_cart/{id}', [HomeController::class, 'add_cart']);
    Route::get('my_cart', [HomeController::class, 'my_cart']);
    Route::post('confirm_order', [HomeController::class, 'confirm_order']);
    Route::get('myorders', [HomeController::class, 'myorders']);
});

// Stripe Payment Routes
Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    // Category Management
    Route::get('view_category', [AdminController::class, 'view_category']);
    Route::post('add_category', [AdminController::class, 'add_category']);
    Route::get('delete_category/{id}', [AdminController::class, 'delete_category']);
    Route::get('edit_category/{id}', [AdminController::class, 'edit_category']);
    Route::post('update_category/{id}', [AdminController::class, 'update_category']);

    // Product Management
    Route::get('add_product', [AdminController::class, 'add_product']);
    Route::post('upload_product', [AdminController::class, 'upload_product']);
    Route::get('view_product', [AdminController::class, 'view_product']);
    Route::get('delete_product/{id}', [AdminController::class, 'delete_product']);
    Route::get('update_product/{id}', [AdminController::class, 'update_product']);
    Route::post('edit_product/{id}', [AdminController::class, 'edit_product']);
    Route::get('product_search', [AdminController::class, 'product_search']);

    // Order Management
    Route::get('view_orders', [AdminController::class, 'view_orders']);
    Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way']);
    Route::get('delivered/{id}', [AdminController::class, 'delivered']);
    Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf']);
});

// Authentication Routes
require __DIR__.'/auth.php';
