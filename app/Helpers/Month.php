<?php

namespace App\Helpers;

class Month
{
    private static $months = [
        "1" => 'Yanvar',
        "2" => 'Fevral',
        "3" => 'Mart',
        "4" => 'Aprel',
        "5" => 'May',
        "6" => 'Iyun',
        "7" => 'Iyul',
        "8" => 'Avgust',
        "9" => 'Sentabr',
        "10" => 'Oktabr',
        "11" => 'Noyabr',
        "12" => 'Dekabr'
    ];

    public static function getMonthName($monthNumber): string
    {
        return static::$months[$monthNumber];
    }
}
