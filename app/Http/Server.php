<?php

namespace App\Http;

class Server
{
    /**
     * @var array
     */
    private array $server;

    /**
     * Server constructor.
     */
    public function __construct()
    {
        $this->server = $_SERVER;
    }

    /**
     * Получить запрос
     *
     * @return array
     */
    public function getRequest(): array
    {
        return $_REQUEST;
    }

    /**
     * Получить знчение по ключу
     *
     * @param string $params
     * @return mixed
     */
    public function get(string $params): mixed
    {
        return $this->server[$params];
    }

    /**
     * Получить метод запроса
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    /**
     * Получить хост
     *
     * @return string
     */
    public function getHost(): string
    {
        return $this->server['HTTP_HOST'];
    }

    /**
     * Получить ссылку
     *
     * @return string
     */
    public function getUrl(): string
    {
        return ltrim($this->server['REQUEST_URI']);
    }

    /**
     * Получить схему запроса
     *
     * @return string
     */
    public function getRequestScheme(): string
    {
        return $this->server['REQUEST_SCHEME'];
    }
}