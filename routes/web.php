<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminMailController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\UpdateProfileController;

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

Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
})->middleware('auth');

Route::get('/courses', [CourseController::class, 'index'])->middleware('auth');
Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->middleware('auth');

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Course Categories',
        'categories' => Category::all()
    ]);
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', function () {
//     return view('dashboard.index', [
//         'title' => 'Dashboard'
//     ]);
// })->middleware('auth');

Route::get('/dashboard/courses/checkSlug', [DashboardController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/courses', DashboardController::class)->middleware('auth')->middleware('isAdmin');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('isAdmin');

Route::resource('/dashboard/users', AdminUserController::class)->except('show')->middleware('isAdmin');

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('edit', [UpdateProfileController::class, 'edit'])->name('profile.edit');
    Route::put('update', [UpdateProfileController::class, 'update'])->name('profile.update');
});

Route::resource('/dashboard/mails', AdminMailController::class)->middleware('isAdmin');
Route::post('/course', [AdminMailController::class, 'store'])->middleware('auth'); 
