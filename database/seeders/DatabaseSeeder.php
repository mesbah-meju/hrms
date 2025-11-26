<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ModuleSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(DesignationSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MenuPermission::class);
        // $this->call(EmployeeAttendanceSeeder::class);
        $this->call(TaxRuleSeeder::class);
        $this->call(SalaryDeductionForLateSeeder::class);
        $this->call(LeaveTypeSeeder::class);
        $this->call(EarnLeaveRuleSeeder::class);
        $this->call(FontSettingSeeder::class);
        $this->call(IpSettingSeeder::class);
    }
}
