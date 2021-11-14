<?php

use App\Http\Controllers\Api\FolderController;
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

Route::get('folder', [FolderController::class, 'index']);
Route::get('folder/{id}', [FolderController::class, 'detail']);
Route::post('folder', [FolderController::class, 'create']);
Route::post('child', [FolderController::class, 'createChild']);
Route::post('file', [FolderController::class, 'createFile']);
