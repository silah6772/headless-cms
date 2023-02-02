<?php

use SharaCms\font\App\Http\Controllers\HomeController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [HomeController::class, 'landing'])->name('landing');
Route::get('/', [HomeController::class, 'landing'])->name('landing');
Route::get('/logo', [HomeController::class, 'logo'])->name('logo');
Route::get('/default-post-image', [HomeController::class, 'defaultPostImage'])->name('default-post-image');
Route::get('/favicon', [HomeController::class, 'favicon'])->name('favicon');
Route::get('/{slug}', [HomeController::class, 'displayPost'])->name('displayPost');

