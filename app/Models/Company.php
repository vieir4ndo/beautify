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

    public function getFederalRegistrationFormatted()
    {
        $CPF_LENGTH = 11;
        $cnpj_cpf = preg_replace("/\D/", '', $this->federal_registration);

        if (strlen($cnpj_cpf) === $CPF_LENGTH) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
        }

        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
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
