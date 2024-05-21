<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InboundStudentController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Playgroud Routes
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update',[productController::class, 'update'])->name('product.update');
Route::delete('/product/{product}', [ProductController::class, 'delete'])->name('product.destroy');


// CRUD routes
Route::get('/student/create', [InboundStudentController::class, 'create'])->name('student.create');
Route::get('/student', [InboundStudentController::class, 'index'])->name('student.index');
Route::post('/student', [InboundStudentController::class, 'store'])->name('student.store');
Route::get('/student/{student}/edit', [InboundStudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student}/edit', [InboundStudentController::class, 'update'])->name('student.update');
Route::delete('/student/{student}', [InboundStudentController::class, 'delete'])->name('student.destroy');

// Route::get('student/create/step-one', [InboundStudentController::class, 'create'])->name('student.create.step.one');
// Route::post('student/create/step-one', [InboundStudentController::class, 'PostCreateStep1'])->name('student.create.step.one.post');
// Route::get('student/create/step-two', [InboundStudentController::class, 'create2'])->name('student.create.step.two');
// Route::post('student/create/step-two', [InboundStudentController::class, 'store'])->name('student.create.step.two.post');

// Progress Tracking Function routes 
Route::get('/inbound/progress_tracking', [ProcessController::class, 'edit'])->name('inbound.progress_tracking.edit');
Route::put('/inbound/progress_tracking/update', [ProcessController::class, 'update'])->name('inbound.progress_tracking.update');

//Dashboard routes
Route::get('/inbound/dashboard', [DashboardController::class, 'index'])->name('inbound.dashboard.index');
Route::get('/inbound/dashboard/create', [DashboardController::class, 'create_uni'])->name('inbound.dashboard.create_uni');
Route::post('/inbound/dashboard', [DashboardController::class, 'store_uni_num'])->name('inbound.dashboard.store_uni');
Route::delete('/inbound/dashboard/{negotiate}', [DashboardController::class, 'destroy'])->name('inbound.dashboard.delete');



