<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'birth_date',
        'type',
        'company_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function isAdministrator()
    {
        return $this->type == \App\Enums\UserType::Administrator->value;
    }

    public function isEmployee()
    {
        return $this->type == \App\Enums\UserType::Employee->value;
    }

    public static function types(): Collection
    {
        return collect(
            [
                ['type' => 1,  'label' => 'Administrador'],
                ['type' => 2,  'label' => 'Administrador de Empresa'],
                ['type' => 3,  'label' => 'Funcionário'],
                ['type' => 4, 'label' => 'Cliente'],
            ]
        );
    }


    public function getPhoneNumberFormatted()
    {
        $tam = strlen(preg_replace("/[^0-9]/", "", $this->phone_number));

        if ($tam == 13) {
            // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos
            return "+" . substr($this->phone_number, 0, $tam - 11) . " (" . substr($this->phone_number, $tam - 11, 2) . ") " . substr($this->phone_number, $tam - 9, 5) . "-" . substr($this->phone_number, -4);
        }
        if ($tam == 12) {
            // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS
            return "+" . substr($this->phone_number, 0, $tam - 10) . " (" . substr($this->phone_number, $tam - 10, 2) . ") " . substr($this->phone_number, $tam - 8, 4) . "-" . substr($this->phone_number, -4);
        }
        if ($tam == 11) {
            // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
            return " (" . substr($this->phone_number, 0, 2) . ") " . substr($this->phone_number, 2, 5) . "-" . substr($this->phone_number, 7, 11);
        }
        if ($tam == 10) {
            // COM CÓDIGO DE ÁREA NACIONAL
            return " (" . substr($this->phone_number, 0, 2) . ") " . substr($this->phone_number, 2, 4) . "-" . substr($this->phone_number, 6, 10);
        }
        if ($tam <= 9) {
            // SEM CÓDIGO DE ÁREA
            return substr($this->phone_number, 0, $tam - 4) . "-" . substr($this->phone_number, -4);
        }
    }
}
