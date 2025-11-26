<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = 'holiday';
    protected $primaryKey = 'holiday_id';

    protected $fillable = [
        'holiday_id', 'holiday_name'
    ];
}
