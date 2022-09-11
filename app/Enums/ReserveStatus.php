<?php

namespace App\Enums;

enum ReserveStatus: int
{
    case Requested = 1;
    case Accepted = 2;
    case Refused = 3;
    case InProgress = 4;
    case Finished = 5;
}
