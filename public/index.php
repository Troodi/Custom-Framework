<?php
/**
 * Запуск приложения
 */
define('FRAMEWORK_START', microtime(true));

/**
 * Подключаем загрущик классов
 */
require '../Autoloader.php';
Autoloader::register();

/**
 * Создаём приложение и запускаем его
 */
$app = new App\Kernel\Application();
$app->singleton(App\Kernel::class);

return $app->create()->run();