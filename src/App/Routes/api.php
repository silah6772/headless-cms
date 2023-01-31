<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SharaCms\App\Http\Controllers\HeadlescmsController;

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

Route::get('get/workspaces',[HeadlescmsController::class,'getWorkspace']);
Route::get('get/menus',[HeadlescmsController::class,'getMenus']);


Route::post('notify-menu',[HeadlescmsController::class,'notifyMenu']);
Route::post('notify-workspace',[HeadlescmsController::class,'notifyWorkspace']);
Route::post('notify-widgets',[HeadlescmsController::class,'notifyWidget']);
Route::post('notify-post',[HeadlescmsController::class,'notifyPost']);

