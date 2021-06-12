<?php

use Illuminate\Support\Facades\Route;
// TodoController
use App\Http\Controllers\TodoController;

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

// index
Route::get('/', [TodoController::class, 'index']);
// タスク作成
Route::post('/todo/create', [TodoController::class, 'create']);
// タスク更新
Route::post('/todo/update', [TodoController::class, 'update']);
// タスク削除
Route::post('/todo/delete', [TodoController::class, 'delete']);
