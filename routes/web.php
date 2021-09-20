<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ConfigwebController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('skill', SkillController::class)->middleware('auth');
Route::resource('portfolio', PortfolioController::class)->middleware('auth');
Route::resource('experience', ExperienceController::class)->middleware('auth');
Route::resource('certificate', CertificateController::class)->middleware('auth');
Route::resource('post', PostController::class)->middleware('auth');
Route::get('/configweb', [ConfigwebController::class, 'index'])->middleware('auth');
Route::put('/configweb/{id}', [ConfigwebController::class, 'update'])->middleware('auth');
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/sendmail', [ProfileController::class, 'sendmail']);

// Route::get('/dashboard', [DashboardController::class, 'index']);
// Route::get('/skill', [SkillController::class, 'index']);
// Route::post('/skill', [SkillController::class, 'store']);
// Route::put('/skill/{id}', [SkillController::class, 'update']);
