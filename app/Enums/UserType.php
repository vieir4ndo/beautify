<?php

namespace App\Enums;

enum UserType: int
{
    case Administrator = 1;
    case CompanyAdministrator = 2;
    case Employee = 3;
    case Client = 4;
}
