<?php

namespace App\Config;

use App\Kernel\Application;

class Config
{
    /**
     * @var array
     */
    private static array $config = [];

    /**
     * Получить конфиг
     *
     * @param string $config
     * @param null $default
     * @return mixed
     * @throws \Exception
     */
    public static function get(string $config, $default = null): mixed
    {
        if (! self::$config) {
            self::$config = Application::getApp()->getConfig();
        }

        $explode = explode('.', $config);
        $config = $explode[0];
        $key = $explode[1];

        if (! array_key_exists($config, self::$config)) {
            throw new \Exception("Config {$config} not found");
        }

        if (! array_key_exists($key, self::$config[$config])) {
            return $default;
        }

        return self::$config[$config][$key];
    }
}