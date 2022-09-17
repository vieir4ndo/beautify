<?php

namespace App\Helpers;

class StringHelper
{
    /**
     * Format a federal registration according to its type
     *
     * @param $value
     * @return bool|string
     * @throws Exception
     */
    public static function formatFederalRegistration($value)
    {
        $value = StringHelper::onlyNumbers($value);

        if (strlen($value) == 10) {
            $value = str_pad($value, 11, "0", STR_PAD_LEFT);
        }

        switch (strlen($value)) {
            case 11:
                $mask = '###.###.###-##';
                break;
            default:
                $mask = '##.###.###/####-##';
                break;
        }

        return StringHelper::mask($value, $mask);
    }

    /**
     * Mask a string according to a param $mask
     * @param $str
     * @param $mask
     * @return mixed
     */
    public static function mask($str, $mask)
    {
        $str = StringHelper::onlyNumbers($str);
        $str = str_replace(' ', '', $str);

        for ($i = 0; $i < strlen($str); $i++) {
            $mask_pos = strpos($mask, "#");

            if ($mask_pos === false) {
                return null;
            }

            $mask[$mask_pos] = $str[$i];
        }

        return $mask;
    }

    /**
     * remove dots from a string
     * @param $string
     * @return null|string
     */
    public static function onlyNumbers($string)
    {
        return preg_replace('/[^0-9]/i', '', $string);
    }

    /**
     * Returns a string based on the expression given
     * @param $string
     * @param $string
     * @param $int
     * @return null|string
     */

    public static function getText($expression, $string, $position = 1)
    {
        preg_match($expression, $string, $result);

        return isset($result[$position]) ? trim($result[$position]) : null;
    }

    /**
     * Returns if a string is present into another
     * @param $string
     * @param $string
     * @return bool
     */

    public static function contains($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && mb_stripos($haystack, $needle) !== false) {
                return true;
            }
        }

        return false;
    }

    public static function formatPhoneNumber($phone_number)
    {
        $tam = strlen(preg_replace("/[^0-9]/", "", $phone_number));

        if ($tam == 13) {
            // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos
            return "+" . substr($phone_number, 0, $tam - 11) . " (" . substr($phone_number, $tam - 11, 2) . ") " . substr($phone_number, $tam - 9, 5) . "-" . substr($phone_number, -4);
        }
        if ($tam == 12) {
            // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS
            return "+" . substr($phone_number, 0, $tam - 10) . " (" . substr($phone_number, $tam - 10, 2) . ") " . substr($phone_number, $tam - 8, 4) . "-" . substr($phone_number, -4);
        }
        if ($tam == 11) {
            // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
            return " (" . substr($phone_number, 0, 2) . ") " . substr($phone_number, 2, 5) . "-" . substr($phone_number, 7, 11);
        }
        if ($tam == 10) {
            // COM CÓDIGO DE ÁREA NACIONAL
            return " (" . substr($phone_number, 0, 2) . ") " . substr($phone_number, 2, 4) . "-" . substr($phone_number, 6, 10);
        }
        if ($tam <= 9) {
            // SEM CÓDIGO DE ÁREA
            return substr($phone_number, 0, $tam - 4) . "-" . substr($phone_number, -4);
        }
    }
}
