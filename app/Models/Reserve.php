<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'init_time',
        'end_time',
        'payment_method',
        'status',
        'client_id',
        'employee_id',
        'company_id',
        'procedure_id',
    ];

    public $timestamps = false;
}
