<?php

namespace App\Validation\Rules;

use App\Validation\Rules\Interfaces\RuleInterface;

class Required implements RuleInterface
{
    /**
     * @param string|null $input
     * @return bool
     */
    public function check(string|null $input): bool
    {
        return ! empty($input);
    }

    /**
     * @return string
     */
    public function message(): string
    {
        return 'Это поле обязательно для заполнения';
    }
}