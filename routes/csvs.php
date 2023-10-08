<?php

use App\Http\Controllers\Csv\CsvCreateController;
use App\Http\Controllers\Csv\CsvDeleteController;
use App\Http\Controllers\Csv\CsvEditController;
use App\Http\Controllers\Csv\CsvExportController;
use App\Http\Controllers\Csv\CsvIndexController;
use App\Http\Controllers\Csv\CsvShowController;
use App\Http\Controllers\Csv\CsvStoreController;
use App\Http\Controllers\Csv\CsvUpdateController;
use App\Http\Controllers\CsvData\CsvDataCreateController;
use App\Http\Controllers\CsvData\CsvDataDeleteController;
use App\Http\Controllers\CsvData\CsvDataEditController;
use App\Http\Controllers\CsvData\CsvDataStoreController;
use App\Http\Controllers\CsvData\CsvDataUpdateController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::prefix('v1/')->group(function () {
        Route::name('csvs/')->group(function() {
            Route::get('/csvs', [CsvIndexController::class, 'index'])->name('index');
            Route::get('/csvs/create', [CsvCreateController::class, 'create'])->name('create');
            Route::post('/csvs', [CsvStoreController::class, 'store'])->name('store');
            Route::get('/csvs/{id}', [CsvShowController::class, 'show'])->name('show');
            Route::get('/csvs/{id}/edit', [CsvEditController::class, 'edit'])->name('edit');
            Route::put('/csvs/{id}', [CsvUpdateController::class, 'update'])->name('update');
            Route::delete('/csvs/{id}', [CsvDeleteController::class, 'delete'])->name('delete');
            Route::get('/csvs/{id}/export', [CsvExportController::class, 'export'])->name('export');

            Route::name('data/')->group(function () {
                Route::get('/csvs/{id}/data/create', [CsvDataCreateController::class, 'create'])->name('create');
                Route::post('/csvs/{id}/data', [CsvDataStoreController::class, 'store'])->name('store');
                Route::get('data/{id}/edit', [CsvDataEditController::class, 'edit'])->name('edit');
                Route::put('data/{id}/update', [CsvDataUpdateController::class, 'update'])->name('update');
                Route::delete('data/{id}', [CsvDataDeleteController::class, 'delete'])->name('delete');
            });
        });
    });
});