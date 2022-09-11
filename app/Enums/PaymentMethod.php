<?php

namespace App\Enums;

enum PaymentMethod: int
{
    case Cash = 1;
    case CreditCard = 2;
    case DebitCard = 3;
    case Pix = 4;
}
