<?php

use App\Models\AcademicLevels;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AcademicLevelController;
use App\Http\Controllers\EducationTypeController;
use App\Http\Controllers\QuestionGroupController;
use App\Http\Controllers\RolePermissionController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('blogs', 'blogs')->name('blogs');
    Route::get('courses', 'courses')->name('courses');
    Route::get('about', 'about')->name('about');
});


Route::middleware(['auth:web', config('jetstream.auth_session'), 'verified',])->group(function () {
    // Admin Routes
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('education-types', EducationTypeController::class)->middleware('can:view education-types,edit education-types,create education-types,update education-types,delete education-types');
    Route::get('educations/publish/{id}', [EducationTypeController::class, 'unpublish'])->name('education-types.unpublish');
    Route::resource('manage-roles', RolePermissionController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('academic-levels', AcademicLevelController::class);
    Route::resource('question-groups', QuestionGroupController::class);


    Route::middleware(['role:founder'])->group(function () {
        Route::controller(UserController::class)->prefix('users')->group(function () {
            Route::get('list', 'list')->name('admin.users-list');
            Route::get('create', 'create')->name('admin.create-user');
            Route::post('store', 'store')->name('admin.store-user');
            Route::get('edit/{encodedId}', 'edit')->name('admin.edit-user');
            Route::get('details/{encodedId}', 'details')->name('admin.details-user');
            Route::put('update/{encodedId}', 'update')->name('admin.update-user');
            Route::delete('delete/{encodedId}', 'destroy')->name('admin.destroy-user');
        });
    });

    // Route::middleware(['role:admin|teacher'])->prefix('admin')->group(function () {

    // });

    Route::get('settings/{id}', [SettingController::class, 'index'])->name('settings');
    Route::post('profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
});
