<?php

namespace App;

class Kernel
{
    /**
     * Регистрация стандартных провайдеров
     *
     * @var array
     */
    public static array $providers = [
        /**
         * Framework providers...
         */
        \App\Router\Router::class,
        \App\Http\Request::class,

        /**
         * Package providers...
         */

        /**
         * Others provers...
         */
    ];

    /**
     * Регистрация правил для валидации
     *
     * @var array
     */
    public static array $rules = [
        'required' => \App\Validation\Rules\Required::class
    ];

    /**
     * Регистрация файлов
     *
     * @var array
     */
    public static array $files = [
        'app/helpers.php',
        'routes/web.php'
    ];

    /**
     * Путь до представлений
     *
     * @var string
     */
    public static string $views = __DIR__ . '/../views/';

    /**
     * Путь до файлов конфигурации
     *
     * @var string
     */
    public static string $configs = __DIR__ . '/../config/';

    /**
     * Пространство имён до контроллеров
     *
     * @var string
     */
    public static string $namespaceToController = 'App\\Controllers';

    /**
     * Начальная директория
     *
     * @var string
     */
    public static string $baseDir =  __DIR__ . '/..';

    /**
     * Ручная регистрация провайдеров
     *
     * @var \App\Kernel\Application $app
     * @return void
     */
    public static function manualRegisterProviders(\App\Kernel\Application $app): void
    {
        $app->singleton(
            \App\Http\Response::class,
            \App\Http\Interfaces\ResponseInterface::class
        );

        $app->singleton(\App\View\View::class);
    }
}