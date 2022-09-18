<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Procedure extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'duration',
        'image_path',
        'company_id',
        "active"
    ];

    public $timestamps = false;

    public static function activity(): Collection
    {
        return collect(
            [
                ['active' => true,  'label' => 'Sim'],
                ['active' => false,  'label' => 'Não'],
            ]
        );
    }
}
