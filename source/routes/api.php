<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResumesController;
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

Route::group(["prefix" => "/resumes"], function () {
    Route::get("/", [ResumesController::class, "index"]);
    Route::get("/{id}", [ResumesController::class, "show"]);
    Route::post("/", [ResumesController::class, "store"]);
    Route::post("/{id}", [ResumesController::class, "update"]);
    Route::get("/{id}/details", [ResumesController::class, "getDetails"]);
    Route::put("/{id}/details", [ResumesController::class, "updateDetails"]);
});

Route::post('register', [RegisterController::class, "register"]);
Route::post('login', [LoginController::class, "login"]);
