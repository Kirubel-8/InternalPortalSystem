<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\VerificationController;

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

// Get fixed secret prefixes from .env
$authSecret = env('AUTH_SECRET', 'secure-portal');
$adminSecret = env('ADMIN_SECRET', 'admin-panel');

Route::get('/', function () {
    return view('welcome');
});

Route::prefix($authSecret)->group(function () {

    // Auth::routes();
    Auth::routes(['verify' => true]);

    // Custom verification notice route (accessible without auth)
    Route::get('/email/verify', [VerificationController::class, 'show'])
        ->name('verification.notice');
    
    // Email verification resend route
    Route::post('/email/resend', [VerificationController::class, 'resend'])
        ->name('verification.resend');
    
    // Email verification verify route (signed)
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
        ->middleware(['signed'])
        ->name('verification.verify');

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// I added
// Route::group(['middleware' => ['auth']], function () {
// Admin routes with fixed secret prefix
Route::middleware(['auth'])->prefix($adminSecret)->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('systems', SystemController::class);

    Route::post('/posts/deleteSelected', 'PostController@deleteSelected')->name('posts.deleteSelected');

    Route::resource('users', UserController::class);
    Route::post('/users/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');
});

// If you have any redirect issues, add this fallback
Route::get('/posts', function () {
    return redirect()->route('posts.index');
});

Route::get('/', [PageController::class, 'index']);