<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/blogs/create', [BlogsController::class, 'viewCreate']);
    Route::post('/blogs/create', [BlogsController::class, 'create']);
    Route::get('/blogs/edit/{id}', [BlogsController::class, 'viewEdit']);
    Route::match(['PUT','PATCH'], '/blogs/edit/{id}', [BlogsController::class, 'update']);
    Route::delete('/blogs/delete/{id}', [BlogsController::class, 'delete']);
});

Route::get('/blogs', [BlogsController::class, 'index']);
Route::get('/blogs/{id}', [BlogsController::class, 'read']);


require __DIR__.'/auth.php';
