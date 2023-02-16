<?php

namespace App\Helpers;

class Month
{
    private static $months = [
        "01" => 'Yanvar',
        "02" => 'Fevral',
        "03" => 'Mart',
        "04" => 'Aprel',
        "05" => 'May',
        "06" => 'Iyun',
        "07" => 'Iyul',
        "08" => 'Avgust',
        "09" => 'Sentabr',
        "10" => 'Oktabr',
        "11" => 'Noyabr',
        "12" => 'Dekabr'
    ];

    public static function getMonthName($monthNumber): string
    {
        return static::$months[$monthNumber];
    }
}
