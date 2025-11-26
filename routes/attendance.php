<?php

use App\Http\Controllers\Attendance\AttendanceReportController;
use App\Http\Controllers\Attendance\ManualAttendanceController;
use App\Http\Controllers\Attendance\WorkShiftController;
use App\Http\Controllers\Attendance\ZktecoAttendanceController;

Route::middleware(['preventbackbutton', 'auth'])->group(function () {

    Route::prefix('workShift')->group(function () {
        Route::get('/', [WorkShiftController::class, 'index'])->name('workShift.index');
        Route::get('/create', [WorkShiftController::class, 'create'])->name('workShift.create');
        Route::post('/store', [WorkShiftController::class, 'store'])->name('workShift.store');
        Route::get('/{workShift}/edit', [WorkShiftController::class, 'edit'])->name('workShift.edit');
        Route::put('/{workShift}', [WorkShiftController::class, 'update'])->name('workShift.update');
        Route::delete('/{workShift}/delete', [WorkShiftController::class, 'destroy'])->name('workShift.delete');
    });
    
    Route::get('dailyAttendance', [AttendanceReportController::class, 'dailyAttendance'])->name('dailyAttendance.dailyAttendance');
    Route::post('dailyAttendance', [AttendanceReportController::class, 'dailyAttendance'])->name('dailyAttendance.dailyAttendance');
    
    Route::get('monthlyAttendance', [AttendanceReportController::class, 'monthlyAttendance'])->name('monthlyAttendance.monthlyAttendance');
    Route::post('monthlyAttendance', [AttendanceReportController::class, 'monthlyAttendance'])->name('monthlyAttendance.monthlyAttendance');
    
    Route::get('myAttendanceReport', [AttendanceReportController::class, 'myAttendanceReport'])->name('myAttendanceReport.myAttendanceReport');
    Route::post('myAttendanceReport', [AttendanceReportController::class, 'myAttendanceReport'])->name('myAttendanceReport.myAttendanceReport');
    
    Route::get('attendanceSummaryReport', [AttendanceReportController::class, 'attendanceSummaryReport'])->name('attendanceSummaryReport.attendanceSummaryReport');
    Route::post('attendanceSummaryReport', [AttendanceReportController::class, 'attendanceSummaryReport'])->name('attendanceSummaryReport.attendanceSummaryReport');
    
    Route::get('manualAttendance', [ManualAttendanceController::class, 'manualAttendance'])->name('manualAttendance.manualAttendance');
    Route::get('manualAttendance/filter', [ManualAttendanceController::class, 'filterData'])->name('manualAttendance.filter');
    Route::post('manualAttendanceStore', [ManualAttendanceController::class, 'store'])->name('manualAttendance.store');
    
    Route::get('downloadDailyAttendance/{id}', [AttendanceReportController::class, 'downloadDailyAttendance']);
    Route::get('downloadMonthlyAttendance', [AttendanceReportController::class, 'downloadMonthlyAttendance']);
    Route::get('downloadMyAttendance', [AttendanceReportController::class, 'downloadMyAttendance']);
    Route::get('downloadAttendanceSummaryReport/{date}', [AttendanceReportController::class, 'downloadAttendanceSummaryReport']);
    
    Route::post('ip-attendance', [ManualAttendanceController::class, 'ipAttendance'])->name('ip.attendance');
    Route::post('zkteco-attendance', [ZktecoAttendanceController::class, 'zktecoAttendance'])->name('zkteco.attendance');
    
    Route::get('setup-employee-attendance', [ManualAttendanceController::class, 'setupDashboardAttendance'])->name('attendance.dashboard');
    Route::post('setup-employee-attendance-post', [ManualAttendanceController::class, 'postDashboardAttendance'])->name('attendance.dashboard.post');
    
    Route::get('csv-attendance', [ManualAttendanceController::class, 'goToCsv'])->name('attendance.csv');
    Route::post('csv-attendance', [ManualAttendanceController::class, 'uploadCsvAttendance'])->name('attendance.csv');
    Route::get('csv-sample-download', [ManualAttendanceController::class, 'downloadEmployeeCsv'])->name('attendance.csv.download');
    
});
