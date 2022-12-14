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
use App\Http\Controllers\SettingController;

// Google Authentication Routes
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google.auth');
Route::get('auth/callback::google', [GoogleAuthController::class, 'callbackGoogle']);

// Home Routes
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('library/', [HomeController::class, 'library'])->name('library');
Route::get('search/', [HomeController::class, 'search'])->name('search');

// Setting Routes
Route::get('settings/', [SettingController::class, 'settings'])->name('settings');
Route::post('settings/saving', [SettingController::class, 'saving'])->name('settings.saving');

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

// Admin Routes
Route::get('super/', [AdminController::class, 'home'])->name('super.home');
Route::delete('super/user_delete', [AdminController::class, 'delete_user'])->name('super.user_delete');
Route::patch('super/change_role', [AdminController::class, 'change_role'])->name('super.change_role');
Route::get('super/articles/', [AdminController::class, 'articles'])->name('super.articles');
Route::delete('super/article_delete', [AdminController::class, 'delete_blog'])->name('super.blog_delete');


// Static routes
Route::get('about/', function () {
    return view('user.about');
})->name('about');

Route::get('privacy/', function () {
    return view('user.privacy-policy');
})->name('privacy');

Route::get('terms/', function () {
    return view('user.terms');
})->name('terms');


// Error Routes
Route::get('404/', function () {
    return view('user.404');
})->name('404');
Route::fallback([DefaultController::class, 'error']);

// Authentication Routes
require __DIR__ . '/auth.php';