<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentsController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

// Auth
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/user-login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/register', [AuthController::class, 'indexRegister'])->name('auth.register');
Route::post('/user-register', [AuthController::class, 'userRegister'])->name('auth.userRegister');

Route::middleware([AuthCheck::class])->group(function () {
    // View
    Route::get('/students', [StudentsController::class, 'myView'])->name('std.myView');
    // Create
    Route::post('/add-new', [StudentsController::class, 'addNewStudent'])->name('std.addNewStudent');
    // PUT
    Route::get('/student/update/{id}', [StudentsController::class, 'updateView'])->name('std.updateView');
    Route::post('/update', [StudentsController::class, 'updateME'])->name('std.studentUpdate');
    // DELETE
    Route::get('/delete/{id}', [StudentsController::class, 'deleteME'])->name('std.studentDelete');
    
    
    
    // Search
   // Route::get('/search', [StudentsController::class, 'search'])->name('std.search');
    // Filter       
   // Route::get('/filter', [StudentsController::class, 'filter'])->name('std.filter');
    // Sort
   // Route::get('/sort', [StudentsController::class, 'sort'])->name('std.sort');
    // Pagination       
   // Route::get('/pagination', [StudentsController::class, 'pagination'])->name('std.pagination');

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

