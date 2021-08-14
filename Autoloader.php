<?php

class Autoloader
{
    /**
     * Загрузщик классов
     *
     * @return void
     */
    public static function register(): void
    {
        spl_autoload_register(function ($class_name) {
            $file = '../' . str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';

            if (file_exists($file)) {
                require $file;
                return true;
            }

            return false;
        });
    }

    /**
     * Зарегистрировать файл
     *
     * @param string $path
     * @return void
     */
    public static function registerFile(string $path): void
    {
        require_once  __DIR__ . '/' . $path;
    }
}