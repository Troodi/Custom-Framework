<?php

namespace App\Validation\Rules\Interfaces;

interface RuleInterface
{
    /**
     * Вернуть true - в случае успешной проверки
     *
     * @param string $input
     * @return bool
     */
    public function check(string $input): bool;

    /**
     * Вернуть сообщение с ошибкой
     *
     * @return string
     */
    public function message(): string;
}