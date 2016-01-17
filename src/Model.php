<?php

namespace Syhol\Spyglass;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use Syhol\Spyglass\Value\Maybe;
use Traversable;

class Model implements ArrayAccess, IteratorAggregate, Countable
{
    /**
     * @var Reader
     */
    private $reader;

    /**
     * @var array
     */
    private $data;

    /**
     * @param Reader $reader
     * @param array $data
     */
    public function __construct(Reader $reader, array $data)
    {
        $this->reader = $reader;
        $this->data = $data;
    }

    /**
     *
     * @param string|null $path
     * @return Maybe Get the maybe for the path
     */
    public function lookup($path = null)
    {
        return $this->reader->find($path, $this->data);
    }

    /**
     * Count elements of an object
     *
     * @param string|null $path
     * @return int The custom count as an integer.
     */
    public function count($path = null)
    {
        return empty($path) ? count($this->data) : count($this->reader->find($path, $this->data));
    }

    /**
     * Retrieve an external iterator
     *
     * @return Traversable An instance of an object implementing Iterator or Traversable
     */
    public function getIterator()
    {
        return new ArrayIterator($this->data);
    }

    /**
     * Whether a offset exists
     *
     * @param mixed $offset
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        return $this->reader->find($offset, $this->data)->exists();
    }

    /**
     * Offset to retrieve
     *
     * @param mixed $offset
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        return $this->reader->find($offset, $this->data)->export();
    }

    /**
     * Offset to set
     *
     * @param mixed $offset
     * @param mixed $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * Offset to unset
     *
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}