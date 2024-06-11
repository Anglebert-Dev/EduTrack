<?php

use App\Http\Controllers\ParentController;
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
            return redirect()->route('parent');
        }
    })->name('teacher.dashboard');
});
