<?php

use App\Http\Controllers\CsvController;
use App\Http\Controllers\CsvDataController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('csvs', CsvController::class);
    Route::get('csvs/{csv}/export', [CsvController::class, 'export'])->name('csvs.export'); // todo fix(?)
    Route::resource('csvs/{csv}/data', CsvDataController::class); // todo fix name

});

require __DIR__.'/auth.php';
