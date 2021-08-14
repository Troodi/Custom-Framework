<?php

namespace App\Http;

use App\Http\Interfaces\ResponseInterface;

class Response implements ResponseInterface
{
    /**
     * @param string $message
     * @param mixed|array $payload
     * @return JsonResponse
     */
    public function success(string $message = 'success', mixed $payload = []): JsonResponse
    {
        return $this->build(true, $message, payload: $payload);
    }

    /**
     * @param string $message
     * @param mixed|array $payload
     * @return JsonResponse
     */
    public function error(string $message = 'error', mixed $payload = []): JsonResponse
    {
        return $this->build(false, $message, payload: $payload);
    }

    /**
     * @param bool $success
     * @param string $message
     * @param int|null $code
     * @param mixed|array $payload
     * @return JsonResponse
     */
    public function build(bool $success, string $message, int|null $code = null, mixed $payload = []): JsonResponse
    {
        $data = [
            'success' => $success,
            'message' => $message,
            'code' => $code
        ];
        $data = array_merge($data, ['payload' => $payload]);

        if (is_null($code)) {
            $code = $success ? 201 : 422;
        }

        return (new JsonResponse($data, $code));
    }
}