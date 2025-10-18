<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('authors', AuthorController::class);
    Route::resource('publishers', PublisherController::class);
    Route::resource('users', UserController::class);
    Route::resource('borrows', BorrowController::class);
    Route::patch('/borrows/{id}/approve', [BorrowController::class, 'approve'])->name('borrows.approve');
    Route::patch('/borrows/{id}/reject', [BorrowController::class, 'reject'])->name('borrows.reject');
});

// Student routes
Route::middleware(['auth', \App\Http\Middleware\StudentMiddleware::class])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'studentDashboard'])->name('dashboard');
    Route::get('/books', [BookController::class, 'studentIndex'])->name('books.index');
    Route::get('/borrows', [BorrowController::class, 'studentIndex'])->name('borrows.index');
    Route::post('/borrows', [BorrowController::class, 'requestBorrow'])->name('borrows.request');
    Route::patch('/borrows/{id}/return', [BorrowController::class, 'returnBook'])->name('borrows.return');
});