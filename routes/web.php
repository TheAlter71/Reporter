<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReactController;
use App\Http\Controllers\TagController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authentication Routes
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google.auth');
Route::get('auth/callback::google', [GoogleAuthController::class, 'callbackGoogle']);

// Home Routes
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('library/', [HomeController::class, 'library'])->name('library');
Route::get('search/', [HomeController::class, 'search'])->name('search');
Route::get('settings/', [HomeController::class, 'settings'])->name('settings');


// Profile Routes
Route::get('profile/{username}/', [ProfileController::class, 'profile'])->name('profile');
Route::patch('update/', [ProfileController::class, 'update'])->name('update.profile');
Route::patch('update/cover', [ProfileController::class, 'update_cover'])->name('update.cover');

// Blog Routes
Route::get('create/', [BlogController::class, 'create'])->name('blog.create');
Route::post('creating/', [BlogController::class, 'creating'])->name('blog.creating');
Route::get('article/{id}/', [BlogController::class, 'blog'])->name('blog');
Route::post('remove/', [BlogController::class, 'remove'])->name('blog.remove');
Route::patch('update_main_image/', [BlogController::class, 'updateMainImage'])->name('blog.update.mainImage');
Route::delete('delete_secondary_image/', [BlogController::class, 'deleteSecondaryImage'])->name('blog.delete.secondaryImage');
Route::get('article/{id}/re-write', [BlogController::class, 'blogUpdate'])->name('blog.update');
Route::patch('article/updating', [BlogController::class, 'updating'])->name('blog.updating');

// Blog Reacts
Route::post('like/', [ReactController::class, 'like'])->name('blog.like');
Route::post('dislike/', [ReactController::class, 'dislike'])->name('blog.dislike');

// Blog Tags
Route::get('article/tag/{tag}/', [TagController::class, 'tag'])->name('tag.filter');


Route::get('category/', function () {
    return view('user.category');
});

Route::get('about/', function () {
    return view('user.about');
});

Route::get('privacy/', function () {
    return view('user.privacy-policy');
});

Route::get('contact/', function () {
    return view('user.contact');
});

Route::get('super/', [AdminController::class, 'home'])->name('super.home');
Route::get('super/users/', [AdminController::class, 'users'])->name('super.users');


Route::get('404/', function () {
    return view('user.404');
})->name('404');
Route::fallback([DefaultController::class, 'error']);

require __DIR__ . '/auth.php';