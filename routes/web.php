<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {

    // Route::get('/home', [DashboardController::class, 'home']);
    // Route::get('/calendar', [DashboardController::class, 'calendar']);
    Route::get('/calendar/{date}/plan', [DashboardController::class, 'dailyPlan']);
    Route::post('/calendar/{date}/create', [DashboardController::class, 'createNewTask']);
    Route::post('/calendar/{date}/{task}/edit', [DashboardController::class, 'editTask']);
    // Route::post('/calendar/{date}/priority/create', [DashboardController::class, 'createNewPriority']);
    // Route::post('/calendar/{date}/todo/create', [DashboardController::class, 'createNewTodo']);
    Route::get('/manage-tasks', [DashboardController::class, 'manageTasks']);
});
Route::get('/{any}', function () {
    return redirect('/calendar/'.date('Y-m-d').'/plan?date='.date('Y-m-d')); // or redirect to another page or return some other response
})->where('any', '.*');
