<?php

use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SurveyController::class, 'index'])->name('form_survey');
Route::get('/survey', [SurveyController::class, 'listingSurvey'])->name('listing_survey');
Route::post('/survey/', [SurveyController::class, 'listingSurvey'])->name('listing_survey_by_note');
Route::post('/', [SurveyController::class, 'postSurvey'])->name('post_survey');