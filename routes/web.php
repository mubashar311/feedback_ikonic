<?php

use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserCommentController;
use App\Http\Controllers\User\UserFeedbackController;
use App\Http\Controllers\User\UserVoteController;
use App\Models\Feedback;
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


Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/feedbacks/all', [FeedbackController::class, 'index'])->name('feedbacks.all');
    Route::post('/feedbacks/comment/{feedback}', [UserCommentController::class, 'comment'])->name('feedbacks.comment');
    Route::post('/feedbacks/vote/{feedback}', [UserVoteController::class, 'vote'])->name('feedbacks.vote');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
        Route::get('users', [AdminUserController::class, 'index'])->name('admin.users');
        Route::post('/users/{user}/delete', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');
        Route::get('feedbacks', [AdminFeedbackController::class, 'index']);
        Route::post('/feedbacks/comment-status/{feedback}', [AdminFeedbackController::class, 'commentStatus'])->name('feedbacks.comment-status');
    });

    Route::group(['prefix' => 'user', 'middleware' => ['user']], function () {
        Route::resource('feedbacks', UserFeedbackController::class);
    });
});
