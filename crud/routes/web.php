<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ExportImportController;

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
Route::resource('task', TaskController::class);

// Route::get('/convert-to-json', function () {
//     return App\Task::paginate(5);
// });
Route::get('exportexcel',[ExportImportController::class,'exportexcel'])->name('exportexcel');
Route::post('importexcel',[ExportImportController::class,'importexcel'])->name('importexcel');
route::get('/filter_bief',[TaskController::class,'filter_bief'])->name('filter_bief');
