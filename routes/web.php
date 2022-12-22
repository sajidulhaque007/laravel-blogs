<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ZenBlogController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ZenBlogController::class,'index'])->name('home');
Route::get('/blog-details/{slug}',[ZenBlogController::class,'blogDetails'])->name('blog.details');
Route::get('/about',[ZenBlogController::class,'about'])->name('about');
Route::get('/contact',[ZenBlogController::class,'contact'])->name('contact');
Route::get('/all-blog-categories',[ZenBlogController::class,'allBlogCategory'])->name('allBlog.category');
Route::get('/blog-category-details/{id}',[ZenBlogController::class,'categoryDetails'])->name('category.details');
Route::get('/user/register',[ZenBlogController::class,'register'])->name('register');
Route::post('/user/register',[ZenBlogController::class,'saveUser'])->name('user.register');
Route::get('/user/login',[ZenBlogController::class,'userLogin'])->name('user.login');
Route::post('/user/login',[ZenBlogController::class,'loginCheck'])->name('user.login');
Route::get('/user/logout',[ZenBlogController::class,'logout'])->name('user.logout');
Route::post('/new-comment',[CommentController::class,'newComment'])->name('new.comment');
Route::post('/new-reply',[ReplyController::class,'newReply'])->name('new.reply');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::post('/category/add',[CategoryController::class,'save'])->name('category.create');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    Route::post('/category/update',[CategoryController::class,'update'])->name('category.update');

    Route::get('/author',[AuthorController::class,'index'])->name('author');
    Route::post('/author/add',[AuthorController::class,'save'])->name('author.create');
    Route::get('/author/edit/{id}',[AuthorController::class,'edit'])->name('author.edit');
    Route::get('/author/delete/{id}',[AuthorController::class,'delete'])->name('author.delete');
    Route::post('/author/update',[AuthorController::class,'update'])->name('author.update');

    Route::get('/blog',[BlogController::class,'index'])->name('blog');
    Route::post('/blog/add',[BlogController::class,'save'])->name('blog.create');
    Route::get('/blog/manage',[BlogController::class,'manage'])->name('blog.manage');
    Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
    Route::get('/blog/delete/{id}',[BlogController::class,'delete'])->name('blog.delete');
    Route::post('/blog/update',[BlogController::class,'update'])->name('blog.update');
    Route::get('/status/{id}',[BlogController::class,'status'])->name('status');
});
