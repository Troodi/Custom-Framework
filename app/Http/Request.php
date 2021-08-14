<?php

namespace App\Http;

class Request extends Server
{
    /**
     * @var array
     */
    private array $requestData;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $request = $this->getRequest();

        foreach ($request as $item => $value) {
            $this->$item = $value;
        }
    }

    /**
     * Определить ajax запрос
     *
     * @return bool
     */
    public function isAjax(): bool
    {
        $http = $this->get('HTTP_X_REQUESTED_WITH');
        if (! empty($http) && strtolower($http) == 'xmlhttprequest') {
            return true;
        }

        return false;
    }

    /**
     * True - https else http
     *
     * @return bool
     */
    public function isHttps(): bool
    {
        return $this->getRequestScheme() == 'https';
    }

    /**
     * Получить все данные из запроса
     *
     * @return array
     */
    public function all(): array
    {
        return $this->requestData;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set(string $name, mixed $value): void
    {
        $this->requestData[$name] = $value;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->requestData[$name];
    }
}