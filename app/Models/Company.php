<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fantasy_name',
        'description',
        'federal_registration',
        'email',
        'phone_number',
        'logo_path',
        'adress_post_code',
        'adress_street',
        'adress_complement',
        'adress_neighborhood',
        'adress_city',
        'adress_state',
        'facebook',
        'instragram',
        'whatsapp',
        'administrator_id'
    ];

    public $timestamps = false;
}
