<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HourlySalary extends Model
{
    protected $table = 'hourly_salaries';
    protected $primaryKey = 'hourly_salaries_id';

    protected $fillable = [
        'hourly_salaries_id','hourly_grade','hourly_rate'
    ];
}
