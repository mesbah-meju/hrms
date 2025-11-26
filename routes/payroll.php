<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payroll\TaxSetupController;
use App\Http\Controllers\Payroll\SalaryDeductionRuleController;
use App\Http\Controllers\Payroll\AllowanceController;
use App\Http\Controllers\Payroll\DeductionController;
use App\Http\Controllers\Payroll\PayGradeController;
use App\Http\Controllers\Payroll\HourlyWagesPayrollController;
use App\Http\Controllers\Payroll\GenerateSalarySheet;
use App\Http\Controllers\Payroll\WorkHourApprovalController;
use App\Http\Controllers\Payroll\BonusSettingController;
use App\Http\Controllers\Payroll\GenerateBonusController;

Route::middleware(['preventbackbutton', 'auth'])->group(function () {

    Route::prefix('taxSetup')->group(function () {
        Route::get('/', [TaxSetupController::class, 'index'])->name('taxSetup.index');
        Route::post('updateTaxRule', [TaxSetupController::class, 'updateTaxRule']);
    });

    Route::prefix('salaryDeductionRuleForLateAttendance')->group(function () {
        Route::get('/', [SalaryDeductionRuleController::class, 'index'])->name('salaryDeductionRule.index');
        Route::post('updateSalaryDeductionRule', [SalaryDeductionRuleController::class, 'updateSalaryDeductionRule']);
    });

    Route::prefix('allowance')->group(function () {
        Route::get('/', [AllowanceController::class, 'index'])->name('allowance.index');
        Route::get('/create', [AllowanceController::class, 'create'])->name('allowance.create');
        Route::post('/store', [AllowanceController::class, 'store'])->name('allowance.store');
        Route::get('/{allowance}/edit', [AllowanceController::class, 'edit'])->name('allowance.edit');
        Route::put('/{allowance}', [AllowanceController::class, 'update'])->name('allowance.update');
        Route::delete('/{allowance}/delete', [AllowanceController::class, 'destroy'])->name('allowance.delete');
    });

    Route::prefix('deduction')->group(function () {
        Route::get('/', [DeductionController::class, 'index'])->name('deduction.index');
        Route::get('/create', [DeductionController::class, 'create'])->name('deduction.create');
        Route::post('/store', [DeductionController::class, 'store'])->name('deduction.store');
        Route::get('/{deduction}/edit', [DeductionController::class, 'edit'])->name('deduction.edit');
        Route::put('/{deduction}', [DeductionController::class, 'update'])->name('deduction.update');
        Route::delete('/{deduction}/delete', [DeductionController::class, 'destroy'])->name('deduction.delete');
    });

    Route::prefix('payGrade')->group(function () {
        Route::get('/', [PayGradeController::class, 'index'])->name('payGrade.index');
        Route::get('/create', [PayGradeController::class, 'create'])->name('payGrade.create');
        Route::post('/store', [PayGradeController::class, 'store'])->name('payGrade.store');
        Route::get('/{payGrade}/edit', [PayGradeController::class, 'edit'])->name('payGrade.edit');
        Route::put('/{payGrade}', [PayGradeController::class, 'update'])->name('payGrade.update');
        Route::delete('/{payGrade}/delete', [PayGradeController::class, 'destroy'])->name('payGrade.delete');
    });

    Route::prefix('hourlyWages')->group(function () {
        Route::get('/', [HourlyWagesPayrollController::class, 'index'])->name('hourlyWages.index');
        Route::get('/create', [HourlyWagesPayrollController::class, 'create'])->name('hourlyWages.create');
        Route::post('/store', [HourlyWagesPayrollController::class, 'store'])->name('hourlyWages.store');
        Route::get('/{hourlyWages}/edit', [HourlyWagesPayrollController::class, 'edit'])->name('hourlyWages.edit');
        Route::put('/{hourlyWages}', [HourlyWagesPayrollController::class, 'update'])->name('hourlyWages.update');
        Route::delete('/{hourlyWages}/delete', [HourlyWagesPayrollController::class, 'destroy'])->name('hourlyWages.delete');
    });

    Route::get('generateSalarySheet', [GenerateSalarySheet::class, 'index'])->name('generateSalarySheet.index');
    Route::get('generateSalarySheet/create', [GenerateSalarySheet::class, 'create'])->name('generateSalarySheet.create');
    Route::get('generateSalarySheet/bulk', [GenerateSalarySheet::class, 'bulkSalary'])->name('generateSalarySheet.bulk');
    Route::get('generateSalarySheet/bulk/result', [GenerateSalarySheet::class, 'generateBulkSalary'])->name('generateSalarySheet.bulk.result');
    Route::get('generateSalarySheet/calculateEmployeeSalary', [GenerateSalarySheet::class, 'calculateEmployeeSalary'])->name('generateSalarySheet.calculateEmployeeSalary');
    Route::post('/store', [GenerateSalarySheet::class, 'store'])->name('saveEmployeeSalaryDetails.store');
    Route::post('generateSalarySheet/makePayment', [GenerateSalarySheet::class, 'makePayment']);
    Route::get('generateSalarySheet/generatePayslip/{id}', [GenerateSalarySheet::class, 'generatePayslip']);
    Route::get('generateSalarySheet/monthSalary', [GenerateSalarySheet::class, 'monthSalary'])->name('generateSalarySheet.monthSalary');

    Route::get('paymentHistory', [GenerateSalarySheet::class, 'paymentHistory'])->name('paymentHistory.paymentHistory');
    Route::post('paymentHistory', [GenerateSalarySheet::class, 'paymentHistory']);
    Route::get('paymentHistory/generatePayslip/{id}', [GenerateSalarySheet::class, 'generatePayslip']);

    Route::get('myPayroll', [GenerateSalarySheet::class, 'myPayroll'])->name('myPayroll.myPayroll');
    Route::get('myPayroll/generatePayslip/{id}', [GenerateSalarySheet::class, 'generatePayslip']);

    Route::get('downloadPayslip/{id}', [GenerateSalarySheet::class, 'downloadPayslip']);
    Route::get('downloadMyPayroll', [GenerateSalarySheet::class, 'downloadMyPayroll']);

    Route::get('workHourApproval', [WorkHourApprovalController::class, 'create'])->name('workHourApproval.create');
    Route::get('workHourApproval/filter', [WorkHourApprovalController::class, 'filter'])->name('workHourApproval.filter');
    Route::post('workHourApproval', [WorkHourApprovalController::class, 'store']);

    Route::prefix('bonusSetting')->group(function () {
        Route::get('/', [BonusSettingController::class, 'index'])->name('bonusSetting.index');
        Route::get('/create', [BonusSettingController::class, 'create'])->name('bonusSetting.create');
        Route::post('/store', [BonusSettingController::class, 'store'])->name('bonusSetting.store');
        Route::get('/{bonusSetting}/edit', [BonusSettingController::class, 'edit'])->name('bonusSetting.edit');
        Route::put('/{bonusSetting}', [BonusSettingController::class, 'update'])->name('bonusSetting.update');
        Route::delete('/{bonusSetting}/delete', [BonusSettingController::class, 'destroy'])->name('bonusSetting.delete');
    });

    Route::prefix('generateBonus')->group(function () {
        Route::get('/', [GenerateBonusController::class, 'index'])->name('generateBonus.index');
        Route::get('/create', [GenerateBonusController::class, 'create'])->name('generateBonus.create');
        Route::post('/store', [GenerateBonusController::class, 'store'])->name('saveEmployeeBonus.store');
        Route::get('/filter', [GenerateBonusController::class, 'filter'])->name('generateBonus.filter');
    });

});
