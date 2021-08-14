<?php

namespace App\Router;

use App\Support\Str;

class Router
{
    /**
     * Хранит в себе карту маршрутов
     *
     * @var array
     */
    private static array $routes = [];

    /**
     * Хранит в себе текущий маршрут
     *
     * @var array
     */
    private static array $route = [];

    /**
     * Добавить get-маршрут
     *
     * @param string $url
     * @param string $controller
     * @return void
     */
    public static function get(string $url, string $controller): void
    {
        self::addRoute('GET', $url,  $controller);
    }

    /**
     * Добавить post-маршрут
     *
     * @param string $url
     * @param string $controller
     * @return void
     */
    public static function post(string $url, string $controller): void
    {
        self::addRoute('POST', $url, $controller);
    }

    /**
     * Добавить маршрут
     *
     * @param string $method
     * @param string $url
     * @param string $controller
     * @return void
     */
    private static function addRoute(string $method, string $url, string $controller): void
    {
        $split = self::splitIntoControllerAndMethod($controller);
        $url = self::normalizeUrl($url);

        self::$routes[$method][$url] = [
            'controller' => $split['controller'],
            'action' => $split['action']
        ];
    }

    /**
     * Привести ссылку к стандартному виду
     *
     * @param string $url
     * @return string
     */
    private static function normalizeUrl(string $url): string
    {
        if ($url[0] != '/') {
            $url = '/' . $url;
        }

        if ($url[strlen($url) - 1] == '/' && strlen($url) > 1) {
            $url = mb_substr($url, 0, -1);
        }

        return $url;
    }

    /**
     * Проверить, если такой маршрут
     *
     * @param string $url
     * @param string $method
     * @return bool
     */
    public function findMatch(string $url, string $method): bool
    {
        //Если есть get-параметры, то удаляем
        if (strpos($url, '?')) {
            $url = Str::delAfter($url, '?');
        }

        //Ищем совпадение
        foreach (self::$routes[$method] as $urlRoute => $route) {
            if ($urlRoute == $url) {
                self::$route = $route;

                return true;
            }
        }

        return false;
    }

    /**
     * Получить текущий маршрут
     *
     * @return array
     */
    public function getCurrentRoute(): array
    {
        return self::$route;
    }

    /**
     * Разделить на контроллер и метод
     *
     * @param string $controller
     * @return array
     */
    private static function splitIntoControllerAndMethod(string $controller): array
    {
        $explode = explode('@', $controller);

        return ['controller' => $explode[0], 'action' => $explode[1]];
    }
}