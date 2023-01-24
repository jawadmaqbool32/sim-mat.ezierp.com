<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('mandatory_questions', API\MandatoryQuestionAPIController::class);


// Route::resource('area_of_interests', API\AreaOfInterestAPIController::class);


Route::resource('sections', API\SectionAPIController::class);


Route::resource('questions', API\QuestionAPIController::class);
