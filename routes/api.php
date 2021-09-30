<?php

use App\Http\Controllers\CreateLessonController;
use App\Http\Controllers\CreateTaskController;
use App\Http\Controllers\GenerateIndicatorController;
use App\Http\Controllers\IndexTaskController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\ShowIndicatorController;
use App\Http\Controllers\ShowLessonController;
use App\Http\Controllers\ShowTaskController;
use App\Http\Controllers\TaskController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/indicators/{id}', [ShowIndicatorController::class, 'show']);
//Route::post('/indicators', [GenerateIndicatorController::class, 'generate']);

Route::apiResource('/indicators', IndicatorController::class);
Route::apiResource('/tasks', TaskController::class);

//Route::get('/tasks', [IndexTaskController::class, 'index']);
//Route::post('/tasks', [CreateTaskController::class, 'create']);
//Route::get('/tasks/{task}', [ShowTaskcontroller::class, 'showTasks']);


