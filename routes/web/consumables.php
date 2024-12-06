<?php

use App\Http\Controllers\Consumables;
use App\Http\Controllers\ConsumableRequestController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'consumables', 'middleware' => ['auth']], function () {
    Route::get(
        '{consumablesID}/checkout/{requestId?}',
        [Consumables\ConsumableCheckoutController::class, 'create']
    )->name('consumables.checkout.show');

    Route::post(
        '{consumablesID}/checkout/{requestId?}',
        [Consumables\ConsumableCheckoutController::class, 'store']
    )->name('consumables.checkout.store');

    Route::post(
        '{consumableId}/upload',
        [Consumables\ConsumablesFilesController::class, 'store']
    )->name('upload/consumable');

    Route::delete(
        '{consumableId}/deletefile/{fileId}',
        [Consumables\ConsumablesFilesController::class, 'destroy']
    )->name('delete/consumablefile');

    Route::get(
        '{consumableId}/showfile/{fileId}/{download?}',
        [Consumables\ConsumablesFilesController::class, 'show']
    )->name('show.consumablefile');

    Route::get('{consumable}/clone',
        [Consumables\ConsumablesController::class, 'clone']
    )->name('consumables.clone.create');
    
    Route::post('cancel-request/{requestId}', [ConsumableRequestController::class, 'cancelConsumableRequestAdmin'])
    ->name('consumables.request.cancel');
});
    
Route::resource('consumables', Consumables\ConsumablesController::class, [
    'middleware' => ['auth'],
    'parameters' => ['consumable' => 'consumable_id'],
]);