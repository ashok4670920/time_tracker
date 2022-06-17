<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeSheetController;
use App\Http\Controllers\BreakLogsController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [TimeSheetController::class, 'index'])->name('ready');
Route::post('/home', [TimeSheetController::class, 'clockin'])->name('start');
Route::get('/view', [TimeSheetController::class, 'view'])->name('end');
Route::post('/view/{id}', [TimeSheetController::class, 'clockout'])->name('clockout');

Route::get('/timesheet/{timesheet}/break_log', [BreakLogsController::class, 'breakIn'])->name('breakin');
Route::get('/timesheet/break_log/{breakLog}', [BreakLogsController::class, 'breakOut'])->name('breakout');

require __DIR__.'/auth.php';
