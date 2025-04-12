<?php

declare(strict_types=1);

namespace LegacyDbz\Core;

use Carbon\Carbon;
use PDO;

class Model
{
    protected string $table;
    protected string $primaryKey = 'id';

    protected array $queryConditions = [];

    protected int $limit = 10;
    protected int $offset = 0;

    public function __construct(protected array $attributes = [])
    {
        if (isset($this->attributes['created_at'])) {
            $this->attributes['created_at'] = Carbon::parse($this->attributes['created_at']);
        }

        if (isset($this->attributes['updated_at'])) {
            $this->attributes['updated_at'] = Carbon::parse($this->attributes['updated_at']);
        }
    }

    public function __get(string $name): mixed
    {
        if ($name === 'created_at' || $name === 'updated_at') {
            return $this->attributes[$name] ?? null;
        }

        return $this->attributes[$name] ?? null;
    }
    public function __set(string $name, mixed $value): void
    {
        $this->attributes[$name] = $value;
    }

    public static function query(): self
    {
        return new static();
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

    public function where(string $column, mixed $value): self
    {
        $this->queryConditions[] = [$column, $value];

        return $this;
    }

    public function get(): Collection
    {
        $sql = "SELECT * FROM {$this->table}";

        if ($this->queryConditions) {
            $whereClauses = [];
            foreach ($this->queryConditions as $condition) {
                $whereClauses[] = "{$condition['column']} = :{$condition['column']}";
            }
            $sql .= " WHERE " . implode(" AND ", $whereClauses);
        }

        $sql .= " LIMIT :limit OFFSET :offset";

        $stmt = Db::prepare($sql);

        foreach ($this->queryConditions as $condition) {
            $stmt->bindValue(":{$condition['column']}", $condition['value']);
        }

        $stmt->bindValue(":limit", $this->limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", $this->offset, PDO::PARAM_INT);

        $stmt->execute();

        $results = Db::fetchAll($stmt);
        $models = [];

        foreach ($results as $result) {
            $instance = new static(attributes: $result);
            $models[] = $instance;
        }

        return new Collection($models);
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    public function resetQuery(): self
    {
        $this->queryConditions = [];
        $this->limit = 10;
        $this->offset = 0;
        return $this;
    }
}