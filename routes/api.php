<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CandidateController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/candidates', [CandidateController::class, 'getCandidatesAPI'])->name('api.getCandidates');
Route::get('/companies', [CompanyController::class, 'getCompanyData'])->name('api.getCompanies');
Route::get('/active-vendors', [VendorController::class, 'getActiveVendors'])->name('api.getActiveVendors');
Route::get('/search-examcodes', [ExamController::class, 'searchExamCodes'])->name('api.searchExamCodes');
Route::get('/get-examcodes', [ExamController::class, 'getExamCodes'])->name('api.getExamCodes');
Route::get('/get-exams/{vendorId?}', [ExamController::class, 'getExams'])->name('api.getExams');
Route::get('/api/getExamByCode', [ExamController::class, 'getExamByCode'])->name('api.getExamByCode');
Route::get('/get-country-details', [CountryController::class, 'getCountryDetails'])->name('api.getCountryDetails');
Route::get('/get-state-details/{countryId?}', [StateController::class, 'getStateDetails'])->name('api.getStateDetails');
Route::get('/get-city-details/{stateId?}', [CityController::class, 'getCityDetails'])->name('api.getCityDetails');
Route::get('/get-company-details', [CompanyController::class, 'getCompanyDetails'])->name('api.getCompanyDetails');
Route::get('/get-user-list', [UserController::class, 'getUserList'])->name('api.getUserList');
Route::get('/get-clients', [ClientController::class, 'getClients'])->name('api.getClients');


