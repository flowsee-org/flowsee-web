<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public website (single-page terminal)
|--------------------------------------------------------------------------
| NOTE: This is the PUBLIC Flowsee site at https://DOMAIN/ .
| Flowsee Studio (internal) is a separate app at /studio — keep apart.
*/

Route::view('/', 'pages.home');

Route::get('/wp-admin', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
Route::post('/wp-admin/profile', [App\Http\Controllers\Admin\AdminController::class, 'updateProfile'])->name('admin.profile')->middleware('auth');
Route::post('/wp-admin/blogs', [App\Http\Controllers\Admin\AdminController::class, 'storeBlog'])->name('admin.blogs.store')->middleware('auth');
Route::delete('/wp-admin/blogs/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroyBlog'])->name('admin.blogs.destroy')->middleware('auth');
Route::post('/wp-admin/employees', [App\Http\Controllers\Admin\AdminController::class, 'storeEmployee'])->name('admin.employees.store')->middleware('auth');
Route::delete('/wp-admin/employees/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroyEmployee'])->name('admin.employees.destroy')->middleware('auth');
Route::post('/wp-admin/contact', [App\Http\Controllers\Admin\AdminController::class, 'updateContact'])->name('admin.contact')->middleware('auth');

Route::get('/login', function () {
    return view('admin.login');
})->name('login');
Route::post('/login', function (\Illuminate\Http\Request $r) {
    if (\Illuminate\Support\Facades\Auth::attempt($r->only('email','password'))) {
        return redirect('/wp-admin');
    }
    return back()->with('err','Bad login');
})->name('login.post');