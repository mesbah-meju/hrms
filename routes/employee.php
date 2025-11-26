<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\BranchController;
use App\Http\Controllers\Employee\DepartmentController;
use App\Http\Controllers\Employee\DesignationController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\EmployeePermanentController;
use App\Http\Controllers\Employee\TerminationController;
use App\Http\Controllers\Employee\WarningController;

Route::middleware(['preventbackbutton', 'auth'])->group(function () {

    Route::prefix('department')->group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('department.index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
        Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
        Route::get('/{department}/edit', [DepartmentController::class, 'edit'])->name('department.edit');
        Route::put('/{department}', [DepartmentController::class, 'update'])->name('department.update');
        Route::delete('/{department}/delete', [DepartmentController::class, 'destroy'])->name('department.delete');
    });
    
    Route::prefix('designation')->group(function () {
        Route::get('/', [DesignationController::class, 'index'])->name('designation.index');
        Route::get('/create', [DesignationController::class, 'create'])->name('designation.create');
        Route::post('/store', [DesignationController::class, 'store'])->name('designation.store');
        Route::get('/{designation}/edit', [DesignationController::class, 'edit'])->name('designation.edit');
        Route::put('/{designation}', [DesignationController::class, 'update'])->name('designation.update');
        Route::delete('/{designation}/delete', [DesignationController::class, 'destroy'])->name('designation.delete');
    });
    
    Route::prefix('branch')->group(function () {
        Route::get('/', [BranchController::class, 'index'])->name('branch.index');
        Route::get('/create', [BranchController::class, 'create'])->name('branch.create');
        Route::post('/store', [BranchController::class, 'store'])->name('branch.store');
        Route::get('/{branch}/edit', [BranchController::class, 'edit'])->name('branch.edit');
        Route::put('/{branch}', [BranchController::class, 'update'])->name('branch.update');
        Route::delete('/{branch}/delete', [BranchController::class, 'destroy'])->name('branch.delete');
    });
    
    Route::prefix('employee')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
        Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
        Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
        Route::get('/{employee}', [EmployeeController::class, 'show'])->name('employee.show');
        Route::put('/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
        Route::delete('/{employee}/delete', [EmployeeController::class, 'destroy'])->name('employee.delete');
        Route::get('/bulk-upload/csv', [EmployeeController::class, 'getBulkUpload'])->name('employee.bulk');
        Route::post('/bulk-upload/csv', [EmployeeController::class, 'storeBulk'])->name('store.bulk');
    });
    
    Route::get('/printEmployee', [EmployeeController::class, 'printEmployee'])->name('employee.print');
    
    Route::prefix('warning')->group(function () {
        Route::get('/', [WarningController::class, 'index'])->name('warning.index');
        Route::get('/create', [WarningController::class, 'create'])->name('warning.create');
        Route::post('/store', [WarningController::class, 'store'])->name('warning.store');
        Route::get('/{warning}/edit', [WarningController::class, 'edit'])->name('warning.edit');
        Route::get('/{warning}', [WarningController::class, 'show'])->name('warning.show');
        Route::put('/{warning}', [WarningController::class, 'update'])->name('warning.update');
        Route::delete('/{warning}/delete', [WarningController::class, 'destroy'])->name('warning.delete');
    });
    
    Route::prefix('termination')->group(function () {
        Route::get('/', [TerminationController::class, 'index'])->name('termination.index');
        Route::get('/create', [TerminationController::class, 'create'])->name('termination.create');
        Route::post('/store', [TerminationController::class, 'store'])->name('termination.store');
        Route::get('/{termination}/edit', [TerminationController::class, 'edit'])->name('termination.edit');
        Route::get('/{termination}', [TerminationController::class, 'show'])->name('termination.show');
        Route::put('/{termination}', [TerminationController::class, 'update'])->name('termination.update');
        Route::delete('/{termination}/delete', [TerminationController::class, 'destroy'])->name('termination.delete');
    });
    
    Route::prefix('permanent')->group(function () {
        Route::get('/', [EmployeePermanentController::class, 'index'])->name('permanent.index');
        Route::get('/updatePermanent', [EmployeePermanentController::class, 'updatePermanent']);
    });

});
