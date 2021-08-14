<?php

namespace App\Support;

class Str
{
    /**
     * Удалить после сибмола
     *
     * @param $string
     * @param $after
     * @return string
     */
    public static function delAfter($string, $after): string
    {
        return trim(substr($string, 0, strpos($string, $after)));
    }
}