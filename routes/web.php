<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public website (single-page terminal)
|--------------------------------------------------------------------------
| NOTE: This is the PUBLIC Flowsee site at https://DOMAIN/ .
| Flowsee Studio (internal) is a separate app at /studio — keep apart.
*/

Route::view('/', 'pages.home');
Route::get('/work/{work}', [PageController::class, 'work'])->name('work.show');

Route::get('/wp-admin', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
Route::post('/wp-admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile')->middleware('auth');
Route::post('/wp-admin/blogs', [AdminController::class, 'storeBlog'])->name('admin.blogs.store')->middleware('auth');
Route::post('/wp-admin/blogs/{id}', [AdminController::class, 'updateBlog'])->name('admin.blogs.update')->middleware('auth');
Route::delete('/wp-admin/blogs/{id}', [AdminController::class, 'destroyBlog'])->name('admin.blogs.destroy')->middleware('auth');
Route::post('/wp-admin/works', [AdminController::class, 'storeWork'])->name('admin.works.store')->middleware('auth');
Route::post('/wp-admin/works/{id}', [AdminController::class, 'updateWork'])->name('admin.works.update')->middleware('auth');
Route::delete('/wp-admin/works/{id}', [AdminController::class, 'destroyWork'])->name('admin.works.destroy')->middleware('auth');
Route::post('/wp-admin/employees', [AdminController::class, 'storeEmployee'])->name('admin.employees.store')->middleware('auth');
Route::post('/wp-admin/employees/{id}', [AdminController::class, 'updateEmployee'])->name('admin.employees.update')->middleware('auth');
Route::delete('/wp-admin/employees/{id}', [AdminController::class, 'destroyEmployee'])->name('admin.employees.destroy')->middleware('auth');
Route::post('/wp-admin/contact', [AdminController::class, 'updateContact'])->name('admin.contact')->middleware('auth');

Route::get('/login', function () {
    return view('admin.login');
})->name('login');
Route::post('/login', function (Request $r) {
    if (Auth::attempt($r->only('email', 'password'))) {
        return redirect('/wp-admin');
    }

    return back()->with('err', 'Bad login');
})->name('login.post');
