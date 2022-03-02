<?php

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

Route::get("/action", [\App\Http\Controllers\Frontend\LandingContactController::class, "index"]);
Route::get("/action/thanks", [\App\Http\Controllers\Frontend\LandingContactController::class, "thanks"]);
Route::post("/action", [\App\Http\Controllers\Frontend\LandingContactController::class, "send"]);
