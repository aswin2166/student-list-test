<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard' ,[StudentController::class, 'index'])
    ->name('dashboard');
    Route::get('students/create',[StudentController::class, 'create'])
    ->name('students.create');
    Route::post('dashboard',[StudentController::class ,'store'])
    ->name('students.store');
    Route::get('students/{id}/edit' , [StudentController::class , 'edit'])
    ->name('students.edit');
    Route::put('students/{id}' , [StudentController::class , 'update'])
    ->name('students.update');
   Route::delete('students/delete/{id}', [StudentController::class, 'destroy'])
    ->name('students.delete');

});

require __DIR__.'/auth.php';
