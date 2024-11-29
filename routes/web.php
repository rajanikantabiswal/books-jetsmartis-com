<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;

Route::get('/', [DashboardController::class, 'showDashboard'])->middleware(['auth', 'verified']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('candidates', CandidateController::class)->middleware(['auth', 'verified']);
//Admin ROutes
Route::resource('users', UserController::class)->middleware(['auth', 'verified']);
Route::resource('vendors', VendorController::class)->middleware(['auth', 'verified']);
Route::resource('exams', ExamController::class)->middleware(['auth', 'verified']);
Route::resource('company', CompanyController::class)->middleware(['auth', 'verified']);
Route::resource('clients', ClientController::class)->middleware(['auth', 'verified']);
Route::resource('leads', LeadController::class)->middleware(['auth', 'verified']);


Route::get('/control-panel', function () {
    return view('admin.master');
})->middleware(['auth', 'verified'])->name('admin.master');



Route::post('/company/is-active-toggle', [CompanyController::class, 'toggleIsActive'])->name('company.isActiveToggle');
Route::post('/vendor/is-active-toggle', [VendorController::class, 'toggleIsActive'])->name('vendor.isActiveToggle');
Route::post('/client/is-active-toggle', [ClientController::class, 'toggleIsActive'])->name('client.isActiveToggle');

Route::get('/get-candidate/{cId}', [CandidateController::class, 'getCandidate'])->name('getCandidate');

require __DIR__.'/auth.php';
