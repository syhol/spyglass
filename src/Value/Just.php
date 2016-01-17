<?php

namespace Syhol\Spyglass\Value;

class Just implements Maybe
{
    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
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
        return true;
    }

    /**
     * @return array
     */
    public function all()
    {
        return [$this->value];
    }

    /**
     * @return mixed
     */
    public function export()
    {
        return $this->value;
    }

    /**
     * Retrieve an external iterator
     *
     * @return Traversable An instance of an object implementing Iterator or
     */
    public function getIterator()
    {
        return new ArrayIterator([$this->value]);
    }

    /**
     * Count elements of an object
     *
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return 1;
    }
}
