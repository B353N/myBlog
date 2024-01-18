<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
# Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

# Route For single post
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post.show');
# Delete Post
Route::delete('/post/{post:slug}', [PostController::class, 'destroy'])->name('post.delete');

# Add comment on post
Route::post('/post/{post:slug}/comment', [CommentController::class, 'store'])->name('post.comment');
# Delete Comment
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
