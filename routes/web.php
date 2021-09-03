<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ConfigwebController;

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
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::resource('skill', SkillController::class);
Route::resource('portfolio', PortfolioController::class);
Route::resource('experience', ExperienceController::class);
Route::resource('certificate', CertificateController::class);
Route::resource('post', PostController::class);
Route::get('/configweb', [ConfigwebController::class, 'index']);
Route::put('/configweb/{id}', [ConfigwebController::class, 'update']);
// Route::get('/dashboard', [DashboardController::class, 'index']);
// Route::get('/skill', [SkillController::class, 'index']);
// Route::post('/skill', [SkillController::class, 'store']);
// Route::put('/skill/{id}', [SkillController::class, 'update']);
