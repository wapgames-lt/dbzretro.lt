<?php

declare(strict_types=1);

namespace LegacyDbz\Core;

use PDO;

class Model
{
    protected string $table;
    protected string $primaryKey = 'id';

    public function __construct(protected array $attributes = [])
    {
    }

    public function save(): bool
    {
        return isset($this->attributes[$this->primaryKey]) ? $this->update() : $this->insert();
    }

    protected function insert(): bool
    {
        $columns = implode(", ", array_keys($this->attributes));
        $placeholders = ":" . implode(", :", array_keys($this->attributes));

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        $stmt = Db::prepare($sql);

        foreach ($this->attributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return (bool) Db::lastInsertId();
    }

    protected function update(): bool
    {
        $set = "";
        foreach ($this->attributes as $key => $value) {
            if ($key !== $this->primaryKey) {
                $set .= "$key = :$key, ";
            }
        }
        $set = rtrim($set, ", ");

        $sql = "UPDATE {$this->table} SET $set WHERE {$this->primaryKey} = :{$this->primaryKey}";
        $stmt = Db::prepare($sql);

        foreach ($this->attributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    public function delete(): bool
    {
        if (isset($this->attributes[$this->primaryKey])) {
            $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :{$this->primaryKey}";
            $stmt = Db::prepare($sql);
            $stmt->bindValue(":{$this->primaryKey}", $this->attributes[$this->primaryKey]);
            return $stmt->execute();
        }
        return false;
    }

    public static function find(int $id): ?self
    {
        $class = static::class;
        $model = new $class();
        $sql = "SELECT * FROM {$model->table} WHERE {$model->primaryKey} = :id LIMIT 1";
        $stmt = Db::prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        $result = Db::fetch($stmt);
        if ($result) {
            $model->attributes = $result;
            return $model;
        }
        return null;
    }

    public function __get(string $name): mixed
    {
        return $this->attributes[$name] ?? null;
    }
    public function __set(string $name, mixed $value): void
    {
        $this->attributes[$name] = $value;
    }

    public static function get(int $limit = 10, int $offset = 0): Collection
    {
        $class = static::class;
        $model = new $class();
        $sql = "SELECT * FROM {$model->table} LIMIT :limit OFFSET :offset";

        $stmt = Db::prepare($sql);
        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();

        $results = Db::fetchAll($stmt);

        $models = [];
        foreach ($results as $result) {
            $instance = new $class();
            $instance->attributes = $result;
            $models[] = $instance;
        }

        return new Collection($models);
    }

    public function setAttribute(string $key, mixed $value): void
    {
        $this->attributes[$key] = $value;
    }

    public function getAttribute(string $key): mixed
    {
        return $this->attributes[$key] ?? null;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }
}