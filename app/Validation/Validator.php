<?php

namespace App\Validation;

use App\Kernel;

class Validator
{
    /**
     * @var bool
     */
    private bool $fails = false;

    /**
     * @var array
     */
    private array $errors = [];

    /**
     * @var array
     */
    private array $validated = [];

    /**
     * @var array
     */
    private array $rules = [];

    /**
     * Validator constructor.
     */
    public function __construct()
    {
        foreach (Kernel::$rules as $rule => $class) {
            $this->rules[$rule] = new $class;
        }
    }

    /**
     * Начать проверку
     *
     * @param array $inputs
     * @param array $rules
     * @return Validator
     */
    public static function make(array $inputs, array $rules): Validator
    {
        $self = new self;

        foreach ($rules as $input => $strOfRules) {
            $rulesForInput = explode('|', $strOfRules);

            foreach ($rulesForInput as $rule) {
                $rule = $self->rules[$rule];
                if (! array_key_exists($input, $inputs)) {
                    $inputs[$input] = null;
                }

                if (! $rule->check($inputs[$input])) {
                    $self->errors[$input] = $rule->message();
                } else {
                    $self->validated[$input] = $inputs[$input];
                }
            }
        }

        if (count($self->errors)) {
            $self->fails = true;
        }

        return $self;
    }

    /**
     * @return bool
     */
    public function fails(): bool
    {
        return $this->fails;
    }

    /**
     * @return array
     */
    public function validated(): array
    {
        return $this->validated;
    }

    /**
     * @return array
     */
    public function errors(): array
    {
        return $this->errors;
    }
}