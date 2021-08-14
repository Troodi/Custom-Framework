<?php

if (! function_exists('dd')) {
    /**
     * Для дебага
     *
     * @param $data
     * @return void
     */
    function dd($data): void
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        exit;
    }
}