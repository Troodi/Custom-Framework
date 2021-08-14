<?php

namespace App\Kernel;

use App\Http\Request;
use App\Kernel;
use App\Router\RedirectToController;
use App\Router\Router;

class Pipeline
{
    /**
     * @var Router
     */
    private Router $router;

    /**
     * @var Request
     */
    private Request $request;

    /**
     * Pipeline constructor.
     */
    public function __construct(Application $app)
    {
        $this->router = $app->get(Router::class);
        $this->request = $app->get(Request::class);
    }

    /**
     * Запуск
     *
     * @return mixed|void
     * @throws \Exception
     */
    public function run()
    {
        //Роутинг
        if ($this->router->findMatch($this->request->getUrl(), $this->request->getMethod())) {
            $route = $this->router->getCurrentRoute();
        } else {
            throw new \Exception("404 not found");
        }

        //Запуск контроллера
        $redirectToController = new RedirectToController($route['controller'], $route['action']);
        $data = $redirectToController->run();

        //Проверяем тип, и выводим данные ввиде json
        if (gettype($data) == 'object') {
            if (get_class($data) == \App\Http\JsonResponse::class) {
                echo $data->getData();
            }
        }

        //Если пропустили строчку, также делаем её json
        if (gettype($data) == 'string' || gettype($data) == 'array') {
            echo json_encode($data);
        }
    }
}