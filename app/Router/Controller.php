<?php

namespace App\Router;

use App\Config\Config;
use App\Database\Database;
use App\Http\Interfaces\ResponseInterface;
use App\Kernel\Application;
use App\Http\Request;
use App\View\View;
use App\Http\Response;

abstract class Controller
{
    /**
     * @var Application
     */
    private Application $app;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->app = Application::getApp();
    }

    /**
     * @return mixed
     */
    protected function request(): mixed
    {
        return $this->app->get(Request::class);
    }

    /**
     * @return mixed
     */
    protected function view(): mixed
    {
        return $this->app->get(View::class);
    }

    /**
     * @param string $config
     * @param null $default
     * @return mixed
     * @throws \Exception
     */
    protected function config(string $config, $default = null): mixed
    {
        return Config::get($config, $default);
    }

    /**
     * @return mixed
     */
    protected function response(): mixed
    {
        return $this->app->get(ResponseInterface::class);
    }

    /**
     * @return Database
     */
    protected function db(): Database
    {
        return Database::instance();
    }

    /**
     * Handle calls to missing methods on the controller.
     *
     * @param string $method
     * @param array $arguments
     *
     * @throws \Exception
     */
    public function __call(string $method, array $arguments)
    {
        throw new \Exception("Method {$method} does not exists.");
    }
}