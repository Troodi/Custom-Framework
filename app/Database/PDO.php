<?php

namespace App\Database;

use App\Config\Config;

class PDO
{
    /**
     * @var
     */
    protected $dsn;

    /**
     * Создать соединение
     *
     * @return \PDO
     * @throws \Exception
     */
    public static function run(): \PDO
    {
        $pdo = new self;

        return $pdo->createPDO();
    }

    /**
     * Создать PDO
     *
     * @return \PDO
     * @throws \Exception
     */
    private function createPDO(): \PDO
    {
        $dsn = $this->getConnectionInformation()->generateDSN($this->dsn);

        return new \PDO($dsn, $this->dsn['username'], $this->dsn['password'], $this->dsn['options']);
    }

    /**
     * Получить информацию для соединения
     *
     * @return $this
     * @throws \Exception
     */
    private function getConnectionInformation(): static
    {
        $driver = Config::get('db.database');
        $this->dsn = Config::get('db.connections')[$driver];

        return $this;
    }

    /**
     * Сгенерировать dsn
     *
     * @param $connection
     * @return string
     */
    private function generateDSN($connection): string
    {
        return "{$connection['driver']}:host={$connection['host']};port={$connection['port']};dbname={$connection['database']};charset={$connection['charset']}";
    }
}