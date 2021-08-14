<?php

namespace App\Http\Interfaces;

interface ResponseInterface
{
    /**
     * Успеный ответ
     *
     * @param string $message
     * @param mixed|array $payload
     */
    public function success(string $message = 'success', mixed $payload = []);

    /**
     * Плохой ответ
     *
     * @param string $message
     * @param mixed|array $payload
     */
    public function error(string $message = 'error', mixed $payload = []);

    /**
     * Построить запрос
     *
     * @param bool $success
     * @param string $message
     * @param int|null $code
     * @param mixed|array $payload
     */
    public function build(bool $success, string $message, null|int $code, mixed $payload = []);
}