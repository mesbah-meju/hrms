<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwardNoticeAndTraining\AwardController;
use App\Http\Controllers\AwardNoticeAndTraining\EmployeeTrainingController;
use App\Http\Controllers\AwardNoticeAndTraining\NoticeController;
use App\Http\Controllers\AwardNoticeAndTraining\TrainingReportController;
use App\Http\Controllers\AwardNoticeAndTraining\TrainingTypeController;

Route::middleware(['preventbackbutton', 'auth'])->group(function () {

    Route::prefix('award')->group(function () {
        Route::get('/', [AwardController::class, 'index'])->name('award.index');
        Route::get('/create', [AwardController::class, 'create'])->name('award.create');
        Route::post('/', [AwardController::class, 'store'])->name('award.store');
        Route::get('/{award}/edit', [AwardController::class, 'edit'])->name('award.edit');
        Route::put('/{award}', [AwardController::class, 'update'])->name('award.update');
        Route::delete('/{award}/delete', [AwardController::class, 'destroy'])->name('award.delete');
    });
    

    Route::prefix('notice')->group(function () {
        Route::get('/', [NoticeController::class, 'index'])->name('notice.index');
        Route::get('/create', [NoticeController::class, 'create'])->name('notice.create');
        Route::post('/', [NoticeController::class, 'store'])->name('notice.store');
        Route::get('/{notice}', [NoticeController::class, 'show'])->name('notice.show');
        Route::get('/{notice}/edit', [NoticeController::class, 'edit'])->name('notice.edit');
        Route::put('/{notice}', [NoticeController::class, 'update'])->name('notice.update');
        Route::delete('/{notice}/delete', [NoticeController::class, 'destroy'])->name('notice.delete');
    });
    
    Route::prefix('trainingType')->group(function () {
        Route::get('/', [TrainingTypeController::class, 'index'])->name('trainingType.index');
        Route::get('/create', [TrainingTypeController::class, 'create'])->name('trainingType.create');
        Route::post('/', [TrainingTypeController::class, 'store'])->name('trainingType.store');
        Route::get('/{trainingType}', [TrainingTypeController::class, 'show'])->name('trainingType.show');
        Route::get('/{trainingType}/edit', [TrainingTypeController::class, 'edit'])->name('trainingType.edit');
        Route::put('/{trainingType}', [TrainingTypeController::class, 'update'])->name('trainingType.update');
        Route::delete('/{trainingType}/delete', [TrainingTypeController::class, 'destroy'])->name('trainingType.delete');
    });
    
    Route::prefix('trainingInfo')->group(function () {
        Route::get('/', [EmployeeTrainingController::class, 'index'])->name('trainingInfo.index');
        Route::get('/create', [EmployeeTrainingController::class, 'create'])->name('trainingInfo.create');
        Route::post('/', [EmployeeTrainingController::class, 'store'])->name('trainingInfo.store');
        Route::get('/{trainingInfo}', [EmployeeTrainingController::class, 'show'])->name('trainingInfo.show');
        Route::get('/{trainingInfo}/edit', [EmployeeTrainingController::class, 'edit'])->name('trainingInfo.edit');
        Route::put('/{trainingInfo}', [EmployeeTrainingController::class, 'update'])->name('trainingInfo.update');
        Route::delete('/{trainingInfo}/delete', [EmployeeTrainingController::class, 'destroy'])->name('trainingInfo.delete');
    });
    
    Route::get('trainingReport', [TrainingReportController::class, 'employeeTrainingReport'])->name('employeeTrainingReport.employeeTrainingReport');
    Route::post('trainingReport', [TrainingReportController::class, 'employeeTrainingReport'])->name('employeeTrainingReport.employeeTrainingReport');
    Route::get('downloadTrainingReport', [TrainingReportController::class, 'downloadTrainingReport']);
});

