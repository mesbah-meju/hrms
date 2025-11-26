<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingType extends Model
{
    protected $table = 'training_type';
    protected $primaryKey = 'training_type_id';

    protected $fillable = [
        'training_type_id', 'training_type_name','status'
    ];
}
