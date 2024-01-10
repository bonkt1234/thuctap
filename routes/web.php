<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/users', [UserController::class, 'index']);
Route::delete('/users/{user_id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [LoginController::class, 'index'])->middleware('auth')->name('dashboard');

Route::resource('posts',PostController::class);
Route::get('/search', [PostController::class, 'search'])->name('posts.search');
Route::get('/posts/category/{category}', [PostController::class, 'postsByCategory'])->name('posts.category');

Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('checkRole:admin');
Route::post('/admin/grant/{userId}', [AdminController::class, 'grantAdminRole'])->name('admin.grant');

Route::post('/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');

Route::post('/report/{postId}/toggle', [ReportController::class, 'toggleReport'])->name('toggle.report');

Route::get('/about_us', function () {
    $user = Auth::user();
    return view('about_us',compact('user'));
})->name('about_us');

