<?php

use App\Http\Controllers\admin\posts\AdminPostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth')->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//admin posts
Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
Route::post('/admin/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
Route::get('/admin/posts/{post}', [AdminPostController::class, 'show'])->name('admin.posts.show');
Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
Route::patch('/admin/posts/{post}', [AdminPostController::class, 'update'])->name('admin.posts.update');


//comments
Route::get('/posts/{post}/comments', [CommentController::class, 'index'])->name('comments.index');

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
//comments admin
Route::get('/admin/comments', [CommentController::class, 'index'])->name('admin.comments.index');
Route::post('/admin/comments', [CommentController::class, 'store'])->name('admin.comments.store');
Route::get('/admin/comments/create', [CommentController::class, 'create'])->name('admin.comments.create');
Route::delete('/admin/comments/{comment}', [CommentController::class, 'destroy'])->name('admin.comments.destroy');
Route::get('/admin/comments/{comment}/edit', [CommentController::class, 'edit'])->name('admin.comments.edit');
Route::patch('/admin/comments/{comment}', [CommentController::class, 'update'])->name('admin.comments.update');



//Reports
Route::get('/reports', function () {
    return "reports.index";
})->middleware(['auth', 'verified'])->name('reports.index');

// profile
Route::get('/profile', function () {
    return "profile.show";
})->name('profile.show');
Route::get('/profile/edit', function () {
    return "profile.edit";
})->name('profile.edit');
Route::patch('/profile', function () {
    return "profile.update";
})->name('profile.update');


//admin dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// users.index
Route::get('/users', function () {
    return "users.index";
})->middleware(['auth', 'verified'])->name('users.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
