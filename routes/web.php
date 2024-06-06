<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;




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

Route::get('/teachers/upload', [TeacherController::class, 'create'])->name('teachers.upload');
Route::post('/teachers', [TeacherController::class, 'storeTeacher'])->name('teachers.store');


Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('post', [HomeController::class, 'post'])->middleware(['auth', 'admin']);

Route::get('/teachers-list', [TeacherController::class, 'displayTeachers'])->name('teachers.list');

Route::post('/teachers/{teacher}/vote', [TeacherController::class, 'updateVote'])->name('teachers.vote');

Route::get('/top-teachers', [TeacherController::class, 'showTopTeachers'])->name('top-teachers');

Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');

Route::resource('departments', DepartmentController::class)->only(['index', 'destroy']);
Route::resource('departments', DepartmentController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
