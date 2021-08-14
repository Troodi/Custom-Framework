<?php

return [

    /**
     * С какой БД будем работать
     *
     * @var string
     */
    'database' => 'mysql',

    /**
     * Настройки для подключения к выбранной БД
     *
     * @var array
     */
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'port' => '3306',
            'database' => 'task',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8mb4',
            'strict' => true,
            'engine' => null,
            'options' => [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ],
        ],
    ]

];