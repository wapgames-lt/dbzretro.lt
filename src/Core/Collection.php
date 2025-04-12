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

    public function filter(callable $callback)
    {
        return new static(array_filter($this->items, $callback));
    }

    public function map(callable $callback)
    {
        return new static(array_map($callback, $this->items));
    }

    public function all()
    {
        return $this->items;
    }

    /**
     * Adds an item to the collection.
     *
     * @param mixed $item
     * @return $this
     */
    public function add($item)
    {
        $this->items[] = $item;
        return $this;
    }

    public function remove($value)
    {
        return new static(array_values(array_diff($this->items, [$value])));
    }

    public function first(?callable $callback = null)
    {
        if ($callback === null) {
            return reset($this->items) ?: null;
        }

        foreach ($this->items as $item) {
            if ($callback($item)) {
                return $item;
            }
        }
        return null;
    }

    public function isEmpty()
    {
        return empty($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    public function each(callable $callback)
    {
        foreach ($this as $key => $item) {
            if ($callback($item, $key) === false) {
                break;
            }
        }

        return $this;
    }
}
