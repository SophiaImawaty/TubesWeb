<?php

use Illuminate\Support\Facades\Route;
use App\Models\Inventaris;
use App\Http\Controllers\InventarisController;


Route::delete('inventaris/{id}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');

Route::resource('inventaris', InventarisController::class);
Route::get('/', function () {
    return view('inventaris/index', [
        'inventaris'=>Inventaris::get(),
    ]);
});
