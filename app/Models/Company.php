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
        'address_post_code',
        'address_street',
        'address_complement',
        'address_neighborhood',
        'address_city',
        'address_state',
        'facebook',
        'instagram',
        'whatsapp',
        'administrator_id',
        "active"
    ];

    public $timestamps = false;
}
