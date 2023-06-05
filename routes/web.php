<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\SitemapController;
// use App\Http\Controllers\TelegramController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Admin\panelController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search']);

//Route::get('/articles',[ArticleController::class,'index']);
//Route::get('/courses',[CourseController::class,'index']);

Route::get('/allarticles', [HomeController::class, 'allArticles']);
Route::get('/allcourses', [HomeController::class, 'allCourses'])->name('allCourses');
Route::get('/abouteme', [HomeController::class, 'abouteMe']);


Route::get('/articles/{articleSlug}', [ArticleController::class, 'single']);

Route::get('/categories/{articleSlug}', [CategoryController::class, 'index']);
Route::get('/courses/{courseSlug}', [CourseController::class, 'single']);
Route::post('/comment', [HomeController::class, 'comment']);
//Route::get('/user/active/email/{token}', [UserController::class, 'Activation'])->name('activation.account');
Route::get('/sitemap', [SitemapController::class, 'index']);
Route::get('/sitemap-article', [SitemapController::class, 'articles']);
Route::get('/feed/articles', [FeedController::class, 'articles']);



//download rout

Route::get('/download/{episode}', [CourseController::class, 'download'])->name('episode.show');
Route::get('/download/show/{episode}', [EpisodeController::class, 'single'])->name('show');
// Route::get('/telegram',[TelegramController::class,'telegram']);
// Route::post('/5437205698:AAGQWULHXCdy0ZsQ1BueXcDMLN4umgHRxto/webhook',[TelegramController::class,'webhook']);

Route::group(['middleware' => 'auth'], function () {
    Route::post('/course/payment', [CourseController::class, 'payment']);
    Route::get('/course/payment/checker', [CourseController::class, 'checker']);

    //-------------------------user Panel-------------------------//

    Route::group(['prefix' => '/user/panel'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.panel');
        Route::get('/history', [UserController::class, 'history'])->name('user.panel.history');
        Route::get('/vip', [UserController::class, 'vip'])->name('user.panel.vip');

        Route::post('/payment', [UserController::class, 'vipPayment'])->name('user.panel.vip.payment');
        Route::get('/checker', [UserController::class, 'vipChecker'])->name('user.panel.vip.checker');
    });
});


//AdminPanel
Route::namespace('\App\Http\Controllers\Admin')->middleware(['auth','CheckAdmin'])->prefix('admin')->group(function () {
    Route::get('/panel', 'panelController@index')->name('admin.home');
    Route::post('/panel/upload-image', 'panelController@uploadImageSubject');
    Route::resource('/articles', 'ArticleController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/courses', 'CourseController');
    //comment section
    Route::get('/comments/unapproved', 'CommentController@unapproved');
    Route::resource('/comments', 'CommentController');
    //payment section
    Route::get('/payments/unsuccessful', 'PaymentController@unsuccessful');
    Route::resource('/payments', 'PaymentController');

    Route::resource('/episodes', 'EpisodeController');
    Route::resource('/roles', 'RoleController');
    Route::resource('/permissions', 'PermissionController');


    Route::namespace('\App\Http\Controllers\Admin')->prefix('users')->group(function () {
        Route::get('/', 'UserController@index');

        //    Route::resource('/level', 'LevelManageController');

        Route::resource('level', 'LevelManageController', ['parameters' => ['level' => 'user']]);
        Route::delete('/{user}/destroy', 'UserController@destroy')->name('users.destroy');
    });
});

//---------------------------AUTHENTICATION----------------------------------//

Route::get('/register', \App\Http\Livewire\Home\Users\Register::class)->name('register');
Route::get('/login', \App\Http\Livewire\Home\Users\Login::class)->name('login');
Route::post('/logout', [\App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::get('/verify-mobile{id}', \App\Http\Livewire\Home\Users\VerifyMobile::class)->name('verify.mobile');
Route::get('/forget-password', \App\Http\Livewire\Home\Users\ForgetPassword::class)->name('forget-password');
Route::get('/verify-mobile-forget/{id}', \App\Http\Livewire\Home\Users\ForgetVerifyPassword::class)->name('verify.forget.password');
Route::get('/change-password/{code}', \App\Http\Livewire\Home\Users\ChangePassword::class)->name('change.password');
//------------------googleAuth------------------////
// Route::get('/login/google', \App\Http\Livewire\Home\Users\ChangePassword::class)->name('login.google');

//  \Auth::routes();
