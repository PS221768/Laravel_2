<?php

use App\Http\APIControllers\AchievementController;
use App\Http\APIControllers\ExerciseController;
use App\Http\APIControllers\AuthenticationController;
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
Route::apiResource('exercise', ExerciseController::class) ->parameters(['exercises' => 'exercise'])->only([
    'index', 'show'
]);


Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('profile', function(Request $request) { return auth()->user();});
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::apiResource('achievement', AchievementController::class) ->parameters(['achievements' => 'achievement']);

    Route::apiResource('exercise', ExerciseController::class)->only([
        'store', 'update', 'destroy'
    ]);

    });