<?php

namespace App\Helpers;

class Number
{
    public static function format(float $number, int $decimals = 2, string $decPoint = '.', string $thousandsSep = ' '): string
    {
        return number_format($number, $decimals, $decPoint, $thousandsSep);
    }
}
