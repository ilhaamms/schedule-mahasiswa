<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ScheduleController;
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

Route::get('/', [ScheduleController::class, 'home']);
Route::post('/addSchedule', [ScheduleController::class, 'addSchedule']);
Route::get('/schedule', [ScheduleController::class, 'schedule']);
Route::get('/searchSchedule/{day}', [ScheduleController::class, 'searchSchedule']);
Route::get('/deleteSchedule/{jam}', [ScheduleController::class, 'deleteSchedule']);
Route::get('/changeSchedule/{jam}', [ScheduleController::class, 'changeSchedule']);
Route::post('/fixChangeSchedule', [ScheduleController::class, 'fixChangeSchedule']);
Route::get('/export', [ScheduleController::class, 'export']);
Route::get('/grafik', [ScheduleController::class, 'grafik']);