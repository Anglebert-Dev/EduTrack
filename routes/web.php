<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/parent', function () {
        // Check if the authenticated user is a parent
        if (Auth::user()->role === 'parent') {
            return view('parents.parent');
        } else {
            // Redirect to the appropriate route for teachers
            return redirect()->route('teacher.dashboard');
        }
    })->name('parent');

    // Route for teacher
    Route::get('/teacher', function () {
        // Check if the authenticated user is a teacher
        if (Auth::user()->role === 'teacher') {
            return view('teacher.dashboard');
        } else {
            // Redirect to an appropriate route if not a teacher
            return redirect()->route('parents.parent');
        }
    })->name('teacher.dashboard');

   Route::get('/homework', [UserController::class, 'index'])->name('homework');
   Route::post('/upload', [UserController::class, 'upload'])->name('upload');
   Route::get('/subjects', [UserController::class, 'show_subjects'])->name('subjects');
   Route::post('/subjects', [UserController::class, 'subjects'])->name('subjects');
   
});


