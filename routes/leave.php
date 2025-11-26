<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Leave\ApplyForLeaveController;
use App\Http\Controllers\Leave\EarnLeaveConfigureController;
use App\Http\Controllers\Leave\HolidayController;
use App\Http\Controllers\Leave\LeaveTypeController;
use App\Http\Controllers\Leave\PublicHolidayController;
use App\Http\Controllers\Leave\ReportController;
use App\Http\Controllers\Leave\RequestedApplicationController;
use App\Http\Controllers\Leave\WeeklyHolidayController;

Route::middleware(['preventbackbutton', 'auth'])->group(function () {

    Route::prefix('manageHoliday')->group(function () {
        Route::get('/', [HolidayController::class, 'index'])->name('holiday.index');
        Route::get('/create', [HolidayController::class, 'create'])->name('holiday.create');
        Route::post('/store', [HolidayController::class, 'store'])->name('holiday.store');
        Route::get('/{manageHoliday}/edit', [HolidayController::class, 'edit'])->name('holiday.edit');
        Route::put('/{manageHoliday}', [HolidayController::class, 'update'])->name('holiday.update');
        Route::delete('/{manageHoliday}/delete', [HolidayController::class, 'destroy'])->name('holiday.delete');
    });
    
    Route::prefix('publicHoliday')->group(function () {
        Route::get('/', [PublicHolidayController::class, 'index'])->name('publicHoliday.index');
        Route::get('/create', [PublicHolidayController::class, 'create'])->name('publicHoliday.create');
        Route::post('/store', [PublicHolidayController::class, 'store'])->name('publicHoliday.store');
        Route::get('/{publicHoliday}/edit', [PublicHolidayController::class, 'edit'])->name('publicHoliday.edit');
        Route::put('/{publicHoliday}', [PublicHolidayController::class, 'update'])->name('publicHoliday.update');
        Route::delete('/{publicHoliday}/delete', [PublicHolidayController::class, 'destroy'])->name('publicHoliday.delete');
    });
    
    Route::prefix('weeklyHoliday')->group(function () {
        Route::get('/', [WeeklyHolidayController::class, 'index'])->name('weeklyHoliday.index');
        Route::get('/create', [WeeklyHolidayController::class, 'create'])->name('weeklyHoliday.create');
        Route::post('/store', [WeeklyHolidayController::class, 'store'])->name('weeklyHoliday.store');
        Route::get('/{weeklyHoliday}/edit', [WeeklyHolidayController::class, 'edit'])->name('weeklyHoliday.edit');
        Route::put('/{weeklyHoliday}', [WeeklyHolidayController::class, 'update'])->name('weeklyHoliday.update');
        Route::delete('/{weeklyHoliday}/delete', [WeeklyHolidayController::class, 'destroy'])->name('weeklyHoliday.delete');
    });
    
    Route::prefix('leaveType')->group(function () {
        Route::get('/', [LeaveTypeController::class, 'index'])->name('leaveType.index');
        Route::get('/create', [LeaveTypeController::class, 'create'])->name('leaveType.create');
        Route::post('/store', [LeaveTypeController::class, 'store'])->name('leaveType.store');
        Route::get('/{leaveType}/edit', [LeaveTypeController::class, 'edit'])->name('leaveType.edit');
        Route::put('/{leaveType}', [LeaveTypeController::class, 'update'])->name('leaveType.update');
        Route::delete('/{leaveType}/delete', [LeaveTypeController::class, 'destroy'])->name('leaveType.delete');
    });
    
    Route::prefix('applyForLeave')->group(function () {
        Route::get('/', [ApplyForLeaveController::class, 'index'])->name('applyForLeave.index');
        Route::get('/create', [ApplyForLeaveController::class, 'create'])->name('applyForLeave.create');
        Route::post('/store', [ApplyForLeaveController::class, 'store'])->name('applyForLeave.store');
        Route::post('getEmployeeLeaveBalance', [ApplyForLeaveController::class, 'getEmployeeLeaveBalance']);
        Route::post('applyForTotalNumberOfDays', [ApplyForLeaveController::class, 'applyForTotalNumberOfDays']);
        Route::get('/{applyForLeave}', [ApplyForLeaveController::class, 'show'])->name('applyForLeave.show');
    });
    
    Route::prefix('earnLeaveConfigure')->group(function () {
        Route::get('/', [EarnLeaveConfigureController::class, 'index'])->name('earnLeaveConfigure.index');
        Route::post('updateEarnLeaveConfigure', [EarnLeaveConfigureController::class, 'updateEarnLeaveConfigure']);
    });
    
    Route::prefix('requestedApplication')->group(function () {
        Route::get('/', [RequestedApplicationController::class, 'index'])->name('requestedApplication.index');
        Route::get('/{requestedApplication}/viewDetails', [RequestedApplicationController::class, 'viewDetails'])->name('requestedApplication.viewDetails');
        Route::put('/{requestedApplication}', [RequestedApplicationController::class, 'update'])->name('requestedApplication.update');
    });
    
    Route::get('leaveReport', [ReportController::class, 'employeeLeaveReport'])->name('leaveReport.leaveReport');
    Route::post('leaveReport', [ReportController::class, 'employeeLeaveReport']);
    Route::get('downloadLeaveReport', [ReportController::class, 'downloadLeaveReport']);
    
    Route::get('summaryReport', [ReportController::class, 'summaryReport'])->name('summaryReport.summaryReport');
    Route::post('summaryReport', [ReportController::class, 'summaryReport']);
    Route::get('downloadSummaryReport', [ReportController::class, 'downloadSummaryReport']);
    
    Route::get('myLeaveReport', [ReportController::class, 'myLeaveReport'])->name('myLeaveReport.myLeaveReport');
    Route::post('myLeaveReport', [ReportController::class, 'myLeaveReport']);
    Route::get('downloadMyLeaveReport', [ReportController::class, 'downloadMyLeaveReport']);
    
    Route::post('approveOrRejectLeaveApplication', [RequestedApplicationController::class, 'approveOrRejectLeaveApplication']);
});

