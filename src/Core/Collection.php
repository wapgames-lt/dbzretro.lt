<?php

namespace LegacyDbz\Core;

use Countable;
use IteratorAggregate;
use Traversable;
use ArrayIterator;

class Collection implements Countable, IteratorAggregate
{
    public function __construct(private array $items = [])
    {
    }

    public function filter(callable $callback): self
    {
        return new static(array_filter($this->items, $callback));
    }

    public function map(callable $callback)
    {
        return new static(array_map($callback, $this->items));
    }

    public function all(): array
    {
        return $this->items;
    }

    public function add(mixed $item): self
    {
        $this->items[] = $item;
        return $this;
    }

    public function remove($value): self
    {
        return new static(array_values(array_diff($this->items, [$value])));
    }

    public function first(?callable $callback = null)
    {
        if ($callback === null) {
            return reset($this->items) ?: null;
        }

        return array_find($this->items, static fn ($item) => $callback($item));
    }

    public function isEmpty(): bool
    {
        return $this->items === [];
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    public function each(callable $callback): self
    {
        foreach ($this as $key => $item) {
            if ($callback($item, $key) === false) {
                break;
            }
        }

        return $this;
    }
}
