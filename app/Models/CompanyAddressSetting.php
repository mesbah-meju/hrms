<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyAddressSetting extends Model
{
    protected $table = 'company_address_settings';
    protected $primaryKey = 'company_address_setting_id';

    protected $fillable = [
        'company_address_setting_id', 'address'
    ];
}
