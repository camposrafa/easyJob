<?php

use App\Http\Controllers\Job\CreateController as JobCreateController;
use App\Http\Controllers\Job\UpdateController as JobUpdateController;
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

//job routes
Route::post('job', [JobCreateController::class, 'store']);
Route::put('job/{id}', [JobUpdateController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
