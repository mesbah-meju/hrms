<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Performance\PerformanceCategoryController;
use App\Http\Controllers\Performance\PerformanceCriteriaController;
use App\Http\Controllers\Performance\EmployeePerformanceController;
use App\Http\Controllers\Performance\PromotionController;
use App\Http\Controllers\Performance\PerformanceReportController;

Route::middleware(['preventbackbutton', 'auth'])->group(function () {

    Route::prefix('performanceCategory')->group(function () {
        Route::get('/', [PerformanceCategoryController::class, 'index'])->name('performanceCategory.index');
        Route::get('/create', [PerformanceCategoryController::class, 'create'])->name('performanceCategory.create');
        Route::post('/store', [PerformanceCategoryController::class, 'store'])->name('performanceCategory.store');
        Route::get('/{performanceCategoryId}/edit', [PerformanceCategoryController::class, 'edit'])->name('performanceCategory.edit');
        Route::put('/{performanceCategoryId}', [PerformanceCategoryController::class, 'update'])->name('performanceCategory.update');
        Route::delete('/{performanceCategoryId}/delete', [PerformanceCategoryController::class, 'destroy'])->name('performanceCategory.delete');
    });

    Route::prefix('performanceCriteria')->group(function () {
        Route::get('/', [PerformanceCriteriaController::class, 'index'])->name('performanceCriteria.index');
        Route::get('/create', [PerformanceCriteriaController::class, 'create'])->name('performanceCriteria.create');
        Route::post('/store', [PerformanceCriteriaController::class, 'store'])->name('performanceCriteria.store');
        Route::get('/{performanceCriteriaId}/edit', [PerformanceCriteriaController::class, 'edit'])->name('performanceCriteria.edit');
        Route::put('/{performanceCriteriaId}', [PerformanceCriteriaController::class, 'update'])->name('performanceCriteria.update');
        Route::delete('/{performanceCriteriaId}/delete', [PerformanceCriteriaController::class, 'destroy'])->name('performanceCriteria.delete');
    });

    Route::prefix('empPerformance')->group(function () {
        Route::get('/', [EmployeePerformanceController::class, 'index'])->name('employeePerformance.index');
        Route::get('/create', [EmployeePerformanceController::class, 'create'])->name('employeePerformance.create');
        Route::post('/store', [EmployeePerformanceController::class, 'store'])->name('employeePerformance.store');
        Route::get('/{employeePerformanceId}/edit', [EmployeePerformanceController::class, 'edit'])->name('employeePerformance.edit');
        Route::put('/{employeePerformanceId}', [EmployeePerformanceController::class, 'update'])->name('employeePerformance.update');
        Route::delete('/{employeePerformanceId}/delete', [EmployeePerformanceController::class, 'destroy'])->name('employeePerformance.delete');
        Route::get('/{id}', [EmployeePerformanceController::class, 'show'])->name('employeePerformance.show');
    });

    Route::prefix('promotion')->group(function () {
        Route::get('/', [PromotionController::class, 'index'])->name('promotion.index');
        Route::get('/create', [PromotionController::class, 'create'])->name('promotion.create');
        Route::post('/store', [PromotionController::class, 'store'])->name('promotion.store');
        Route::get('/{promotion}/edit', [PromotionController::class, 'edit'])->name('promotion.edit');
        Route::put('/{promotion}', [PromotionController::class, 'update'])->name('promotion.update');
        Route::delete('/{promotion}/delete', [PromotionController::class, 'destroy'])->name('promotion.delete');
        Route::post('/findEmployeeInfo', [PromotionController::class, 'findEmployeeInfo']);
        Route::post('/findPayGradeWiseSalary', [PromotionController::class, 'findPayGradeWiseSalary']);
    });

    Route::get('performanceSummaryReport', [PerformanceReportController::class, 'performanceSummaryReport'])->name('performanceSummaryReport.performanceSummaryReport');
    Route::post('performanceSummaryReport', [PerformanceReportController::class, 'performanceSummaryReport']);

    Route::get('downloadPerformanceSummaryReport', [PerformanceReportController::class, 'downloadPerformanceSummaryReport']);
});

