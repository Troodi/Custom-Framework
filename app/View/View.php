<?php

namespace App\View;

use App\Kernel;

class View
{
    /**
     * @var string
     */
    private static string $view;

    /**
     * View constructor.
     */
    public function __construct()
    {
        self::$view = Kernel::$views;
    }

    /**
     * Рендер страницы
     *
     * @param string $view
     * @param array|null $variables
     * @throws \Exception
     */
    public function render(string $view, array|null $variables = null): void
    {
        if (! is_null($variables)) {
            extract($variables);
        }
        $view = self::$view . $view . '.php';

        ob_start();
        if (is_file($view)) {
            require $view;
        } else {
            throw new \Exception("View {$view} not founded");
        }
        $content = ob_get_clean();

        if (! empty($layout)) {
            $layout = self::$view. "/layouts/{$layout}.php";

            if (is_file($layout)) {
                require $layout;
            } else {
                throw new \Exception("Layout {$layout} not founded");
            }
        } else {
            echo $content;
        }
    }
}