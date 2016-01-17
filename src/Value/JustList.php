<?php

namespace Syhol\Spyglass\Value;

class JustList implements Maybe
{
    /**
     * @var array
     */
    protected $values;

    /**
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        $this->values = $values;
    }

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
        return ! empty($this->values);
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->values;
    }

    /**
     * @return mixed
     */
    public function export()
    {
        return $this->values;
    }

    /**
     * Retrieve an external iterator
     *
     * @return Traversable An instance of an object implementing Iterator or
     */
    public function getIterator()
    {
        return new ArrayIterator($this->values);
    }

    /**
     * Count elements of an object
     *
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return count($this->values);
    }
}
