<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Setting\GeneralSettingController;
use App\Http\Controllers\Setting\ServicesController;
use App\Http\Controllers\Setting\FrontSettingController;

Route::middleware(['preventbackbutton', 'auth'])->group(function () {

    Route::prefix('generalSettings')->group(function () {
        Route::get('/', [GeneralSettingController::class, 'index'])->name('generalSettings.index');
        Route::post('/', [GeneralSettingController::class, 'store'])->name('generalSettings.store');
        Route::get('/{generalSettings}/edit', [GeneralSettingController::class, 'edit'])->name('generalSettings.edit');
        Route::put('/{generalSettings}', [GeneralSettingController::class, 'update'])->name('generalSettings.update');
        Route::post('printHeadSettings', [GeneralSettingController::class, 'printHeadSettingsStore'])->name('printHeadSettings.store');
        Route::put('printHeadSettings/{id}', [GeneralSettingController::class, 'printHeadSettingsUpdate'])->name('printHeadSettings.update');
    });

    // Frontend Setting
    Route::resource('service', ServicesController::class);
    // Frontend Settings Control
    Route::get('setting-front-page', [FrontSettingController::class, 'index'])->name('front.setting');
    Route::post('setting-front-page-submit', [FrontSettingController::class, 'store'])->name('front.setting.submit');
});