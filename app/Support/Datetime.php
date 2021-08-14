<?php

namespace App\Support;

class Datetime
{
    /**
     * Подготовить дату для БД
     *
     * @param string $date
     * @return string
     */
    public static function createTimestamp(string $date): string
    {
        $timestamp = strtotime($date);

        return date('Y-m-d H:i:s', $timestamp);
    }
}