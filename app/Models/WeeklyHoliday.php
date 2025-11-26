<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeeklyHoliday extends Model
{
    protected $table = 'weekly_holiday';
    protected $primaryKey = 'week_holiday_id';

    protected $fillable = [
        'week_holiday_id', 'day_name','status'
    ];
}
