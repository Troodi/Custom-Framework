<?php

namespace App\Database;

class Database
{
    /**
     * @var \PDO
     */
    protected \PDO $pdo;

    /**
     * @var
     */
    protected static $instance;

    /**
     * @var mixed
     */
    private mixed $result;

    /**
     * Database constructor.
     *
     * @throws \Exception
     */
    protected function __construct()
    {
        $this->pdo = PDO::run();
    }

    /**
     * @return Database
     */
    public static function instance(): Database
    {
        if (self::$instance == null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * @param string $sql
     * @param array $data
     * @return Database
     */
    public function query(string $sql, array $data = []): static
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
        $this->result = $statement;

        return $this;
    }

    /**
     * Получить все данные
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->result->fetchAll();
    }

    /**
     * Получить только первую строчку
     *
     * @return mixed
     */
    public function first(): mixed
    {
        return $this->result->fetch();
    }
}