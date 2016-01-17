<?php

namespace Syhol\Spyglass\Value;

class Nothing implements Maybe
{
    /**
     * @param Maybe $other
     * @return JustList
     */
    public function combine(Maybe $other)
    {
        return new JustList(array_merge($this->all(), $other->all()));
    }

    /**
     * @return bool
     */
    public function exists()
    {
        return false;
    }

    /**
     * @return array
     */
    public function all()
    {
        return [];
    }

    /**
     * @return mixed
     */
    public function first()
    {
        return null;
    }

    /**
     * @return mixed
     */
    public function export()
    {
        return null;
    }

    /**
     * Retrieve an external iterator
     *
     * @return Traversable An instance of an object implementing Iterator or
     */
    public function getIterator()
    {
        return new ArrayIterator([]);
    }

    /**
     * Count elements of an object
     *
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return 0;
    }
}