<?php

use App\Http\Livewire\DetailFile;
use App\Http\Livewire\FileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('tes', function () {
    return view('layouts.dashboard');
});

Route::get('files', FileController::class)->name('folder');
Route::get('files/{id}', DetailFile::class)->name('folder-detail');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
