<?php

namespace LegacyDbz\Core;

class Collection
{
    protected $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Filters the collection using a callback function.
     *
     * @param callable $callback
     * @return Collection
     */
    public function filter(callable $callback)
    {
        return new static(array_filter($this->items, $callback));
    }

    /**
     * Maps the collection to a new array using a callback.
     *
     * @param callable $callback
     * @return Collection
     */
    public function map(callable $callback)
    {
        return new static(array_map($callback, $this->items));
    }

    /**
     * Returns all items in the collection.
     *
     * @return array
     */
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

    /**
     * Removes an item from the collection by its value.
     *
     * @param mixed $value
     * @return Collection
     */
    public function remove($value)
    {
        return new static(array_values(array_diff($this->items, [$value])));
    }

    /**
     * Finds the first item that satisfies a condition.
     *
     * @param callable $callback
     * @return mixed|null
     */
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

    /**
     * Checks if the collection is empty.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->items);
    }
}