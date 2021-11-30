<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WoodController;
use App\Http\Controllers\API\StoneController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\SentenceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::resource('woods', WoodController::class);
// Route::apiResource('stones', StoneController::class);

Route::resource('words', WordController::class)->middleware(['auth']);
Route::resource('sentences', SentenceController::class)->middleware(['auth']);

Route::delete('/words', [WordController::class, 'destroyAll'])->name('words.destroyAll')->middleware(['auth']);
Route::delete('/sentences', [SentenceController::class, 'destroyAll'])->name('sentences.destroyAll')->middleware(['auth']);

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/examples/{id}', [HomeController::class, 'showExamples'])->name('home.examples');
