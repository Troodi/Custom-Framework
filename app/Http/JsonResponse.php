<?php

namespace App\Http;

class JsonResponse
{
    /**
     * @var string
     */
    private string $json;

    /**
     * @var int
     */
    private int $status;

    /**
     * JsonResponse constructor.
     */
    public function __construct(array $data, int $status = 200)
    {
        $this->json = json_encode($data);
        $this->status = $status;
    }

    /**
     * Получить данные для отправки
     *
     * @return mixed
     */
    public function getData(): mixed
    {
        http_response_code($this->status);
        return $this->json;
    }
}