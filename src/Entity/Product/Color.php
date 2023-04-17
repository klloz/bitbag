<?php

declare(strict_types=1);

namespace App\Entity\Product;

enum Color: string
{
    case BLUE = 'blue';
    case GREEN = 'green';
    case RED = 'red';
}
