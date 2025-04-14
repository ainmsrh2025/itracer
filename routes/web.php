<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AlumniAuthController;
use App\Http\Controllers\PensyarahAuthController;

// Grouping Admin Routes
Route::get('/', function () {
    return view('auth.login-selection'); // Pastikan fail blade ini wujud dalam resources/views/auth/
})->name('login-selection');
Route::prefix('admin')->name('admin.')->group(function () {

    // Admin Login and Logout Routes
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected Routes (Requires admin authentication)
    Route::middleware('auth.admin')->group(function () {

        // Dashboard Route
        Route::get('dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');

        // Statistics
        Route::get('/statistics', [AdminAuthController::class, 'getStatistics'])->name('statistics');
        Route::get('question-statistics', [AdminController::class, 'getQuestionStatistics'])->name('questionStatistics');

        // User Management Routes
        Route::get('user', [AdminAuthController::class, 'indexUser'])->name('user');
        Route::get('list-user', [AdminAuthController::class, 'listUser'])->name('list_user');
        Route::post('user', [AdminAuthController::class, 'storeUser'])->name('store_user');
        Route::get('user/edit/{id}', [AdminAuthController::class, 'editUser'])->name('edit_user'); // Updated route name
        Route::put('user/update/{id}', [AdminAuthController::class, 'updateUser'])->name('update_user');
        Route::delete('user/{id}', [AdminAuthController::class, 'destroyUser'])->name('destroy_user');

        // Career Management Routes
        Route::get('career', [AdminAuthController::class, 'careerIndex'])->name('career');
        Route::get('career', [AdminAuthController::class, 'showCareer'])->name('career');
        Route::post('career/store', [AdminAuthController::class, 'storeCareer'])->name('career.store');
        Route::get('career/{id}/edit', [AdminAuthController::class, 'editCareer'])->name('career.edit'); // Tambah route ini
        Route::put('career/{id}', [AdminAuthController::class, 'updateCareer'])->name('career.update');
        Route::delete('career/{id}', [AdminAuthController::class, 'destroyCareer'])->name('career.destroy');
        
        // Question Management Routes
        Route::get('questions', [AdminAuthController::class, 'indexQuestions'])->name('questions');
        Route::get('questions/edit/{id}', [AdminAuthController::class, 'editQuestion'])->name('questions.edit');
        Route::put('questions/update/{id}', [AdminAuthController::class, 'updateQuestion'])->name('questions.update');
        Route::post('questions/store', [AdminAuthController::class, 'storeQuestion'])->name('questions.store');
        Route::delete('questions/{id}/delete', [AdminAuthController::class, 'deleteQuestion'])->name('questions.delete');
        
        // Survey Records Routes
        Route::get('records', [AdminAuthController::class, 'surveyRecords'])->name('records');
        Route::get('records/create', [AdminAuthController::class, 'createSurveyRecord'])->name('records.create');
        Route::post('records', [AdminAuthController::class, 'storeSurveyRecord'])->name('records.store');
        Route::delete('records/{id}', [AdminAuthController::class, 'deleteSurveyRecord'])->name('records.delete');
    });
});


// Group routes for Alumni
Route::prefix('alumni')->name('alumni.')->group(function () {
    Route::get('/login', [AlumniAuthController::class, 'showLoginForm'])->name('login'); // Alumni Login Page
    Route::post('/login', [AlumniAuthController::class, 'login']); // Alumni Login Process
    Route::post('/logout', [AlumniAuthController::class, 'logout'])->name('logout'); // Alumni Logout

    Route::middleware('auth:alumni')->group(function () {
        Route::get('/dashboard', [AlumniAuthController::class, 'dashboard'])->name('dashboard'); // Alumni Dashboard
        Route::get('/survey', [AlumniAuthController::class, 'surveyPage'])->name('survey'); // Survey Page
        Route::post('/survey', [AlumniAuthController::class, 'submitSurvey'])->name('survey.submit'); // Submit Survey
        // Route::get('/survey/filter', [AlumniAuthController::class, 'filter'])->name('survey.filter');

        // Alumni Profile Update Route
        Route::put('/update', [AlumniAuthController::class, 'updateProfile'])->name('update'); // Alumni Profile Update
    });
});

// Group routes for Pensyarah
Route::prefix('pensyarah')->group(function () {
    Route::get('/login', [PensyarahAuthController::class, 'showLoginForm'])->name('pensyarah.login');
    Route::post('/login', [PensyarahAuthController::class, 'login']);
    Route::post('/logout', [PensyarahAuthController::class, 'logout'])->name('pensyarah.logout');

    Route::middleware('auth:pensyarah')->group(function () {
        Route::get('/dashboard', [PensyarahAuthController::class, 'dashboard'])->name('pensyarah.dashboard');
    });  

    Route::get('/records', [PensyarahAuthController::class, 'index'])->name('pensyarah.records');

});

