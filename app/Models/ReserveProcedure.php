<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReserveProcedure extends Model
{
    use HasFactory;

    protected $fillable = [
        'reserve_id',
        'procedure_id',
    ];

    public $timestamps = false;
}
