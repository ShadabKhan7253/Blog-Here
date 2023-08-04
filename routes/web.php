<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/categories/{category}/blogs', [FrontendController::class, 'category'])
    ->name('frontend.category');
Route::get('/tags/{tag}/blogs', [FrontendController::class, 'tag'])
    ->name('frontend.tag');
Route::get('/blogs/{blog}', [FrontendController::class, 'show'])
    ->name('frontend.blogs.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/admin')->name('admin.')->group(function() {
        Route::get('/dashboard',function() {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('categories', CategoriesController::class)->except(['show']);
        Route::resource('tags', TagsController::class)->except(['show']);


        Route::get('/blogs/trashed', [BlogsController::class,'trashed'])->name('blogs.trashed');
        Route::resource('blogs', BlogsController::class);
        Route::delete('/blogs/{blog}/trash', [BlogsController::class,'trash'])->name('blogs.trash');
        Route::put('/blogs/{blog}/publish', [BlogsController::class,'publish'])->name('blogs.publish');
        Route::put('/blogs/{blog}/restore', [BlogsController::class,'restore'])->name('blogs.restore');

        Route::resource('users', UserController::class);
        Route::put('users/makeAdmin/{user}', [UserController::class, 'makeAdmin'])->name('users.makeAdmin');
        Route::put('users/revokeAdmin/{user}', [UserController::class, 'revokeAdmin'])->name('users.revokeAdmin');
        Route::get('authorized-user', [UserController::class,'authorized']);
        Route::get('unauthorized-user', [UserController::class,'unauthorized'])->name('users');

        Route::resource('comment', CommentController::class);
    });
});

require __DIR__.'/auth.php';
