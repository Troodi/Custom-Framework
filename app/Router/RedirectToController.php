<?php

namespace App\Router;

use App\Kernel;

class RedirectToController
{
    /**
     * @var string
     */
    private string $controller;

    /**
     * @var string
     */
    private string $action;

    /**
     * RedirectToController constructor.
     *
     * @param string $controller
     * @param string $action
     */
    public function __construct(string $controller, string $action)
    {
        $this->controller = Kernel::$namespaceToController . '\\' . $controller;
        $this->action = $action;
    }

    /**
     * Запуск обработки
     *
     * @return mixed
     * @throws \Exception
     */
    public function run(): mixed
    {
        return $this->checkController()->dispatch();
    }

    /**
     * Запустить метод из контроллера
     *
     * @return mixed
     */
    private function dispatch(): mixed
    {
        return call_user_func([new $this->controller, $this->action]);
    }

    /**
     * Проверка существует ли контроллер
     *
     * @return RedirectToController
     * @throws \Exception
     */
    private function checkController(): RedirectToController
    {
        $file = Kernel::$baseDir . '/' . $this->controller . '.php';
        if (! file_exists($file)) {
            throw new \Exception("Controller {$this->controller} not found.");
        }

        return $this;
    }
}