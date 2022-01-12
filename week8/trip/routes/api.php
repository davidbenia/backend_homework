<?php

use App\Http\Controllers\CountryController;
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

Route::get("/countries/list", [CountryController::class, "list"]);
Route::get("/countries/visited", [CountryController::class, "visited"]);
Route::get("/countries/to-visit", [CountryController::class, "toVisit"]);
Route::post("/add-visited", [CountryController::class, "addVisited"]);
Route::post("/add-to-visit", [CountryController::class, "addToVisit"]);
Route::delete("/delete-visited", [CountryController::class, "deleteVisited"]);
Route::delete("/delete-to-visit", [CountryController::class, "deleteToVisit"]);
