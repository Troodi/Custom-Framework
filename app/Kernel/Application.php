<?php

namespace App\Kernel;

use App\Config\Config;
use Autoloader;
use App\Kernel;
use App\Kernel\Pipeline;

class Application
{
    /**
     * @var Application
     */
    private static Application $app;

    /**
     * @var array
     */
    private static array $providers;

    /**
     * @var array
     */
    private static array $files;

    /**
     * @var array
     */
    private static array $config;

    /**
     * @var array
     */
    private array $container = [];

    /**
     * Application constructor.
     */
    public function __construct()
    {
        self::$providers = Kernel::$providers;
        self::$files = Kernel::$files;
    }

    /**
     * Создать приложение
     *
     * @return \App\Kernel\Pipeline
     * @throws \Exception
     */
    public function create(): \App\Kernel\Pipeline
    {
        //Загружаем конфигорационные файлы
        $this->loadConfigs();

        //Регистрируем провайдеры
        foreach (self::$providers as $provider) {
            $this->singleton($provider);
        }

        //Регистрируем файлы
        foreach (self::$files as $file) {
            Autoloader::registerFile($file);
        }

        //Регистрируем ручные провайдеры
        Kernel::manualRegisterProviders($this);

        self::$app = $this;

        //Дебаг
        $this->debug();

        //Запускаем pipeline
        return new Pipeline($this);
    }

    /**
     * Debug mode
     *
     * @throws \Exception
     * @return void
     */
    private function debug(): void
    {
        if (Config::get('app.debug', false)) {
            error_reporting(E_ALL);
            ini_set('display_startup_errors', 1);
            ini_set('display_errors', '1');
        }
    }

    /**
     * Зарегистрировать провайдер как singleton
     *
     * @param string $class
     * @param null $interface
     * @param null $closure
     * @return void
     */
    public function singleton(string $class, $interface = null, $closure = null): void
    {
        $this->register($class, $interface, $closure, true);
    }

    /**
     * Зарегистрировать провайдер как bind
     *
     * @param string $class
     * @param null $interface
     * @param null $closure
     * @return void
     */
    public function bind(string $class, $interface = null, $closure = null): void
    {
        $this->register($class, $interface, $closure, false);
    }

    /**
     * Зарегистрировать провайдер
     *
     * @param string $class
     * @param $interface
     * @param $closure
     * @param bool $singleton
     * @return void
     */
    private function register(string $class, $interface, $closure, bool $singleton): void
    {
        $this->container[is_null($interface) ? $class : $interface] = [
            'singleton' => $singleton,
            'object' => $singleton ? new $class : $class,
            'closure' => $closure
        ];
    }

    /**
     * Получить экземпляр провайдера
     *
     * @param string $provider
     * @return mixed
     */
    public function get(string $provider): mixed
    {
        $provider = $this->container[$provider];

        if ($provider['singleton']) {
            return $provider['object'];
        } else {
            return is_null($provider['closure']) ? new $provider['object'] : $provider['closure'];
        }
    }

    /**
     * Загружаем настройки
     *
     * @return void
     */
    private function loadConfigs(): void
    {
        $pathToConfigs = Kernel::$configs;
        $files = scandir($pathToConfigs);
        unset($files[0], $files[1]);

        foreach ($files as $file) {
            $key = str_replace('.php', '', $file);
            self::$config[$key] = require_once $pathToConfigs . '/' . $file;
        }
    }

    /**
     * Получить конфиг
     *
     * @return array
     */
    public function getConfig(): array
    {
        return self::$config;
    }

    /**
     * Получить приложение
     *
     * @return Application
     */
    public static function getApp(): Application
    {
        return self::$app;
    }
}