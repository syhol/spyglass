<?php

namespace Syhol\Spyglass;

use ArrayAccess;

class Writer
{
    /**
     * @param string $path
     * @param array|ArrayAccess $data
     * @param callable $mapper
     * @return Value
     */
    public function map($path, $data, callable $mapper)
    {

    }
    
    /**
     * @param string $path
     * @param array|ArrayAccess $data
     * @param callable $filter
     * @return Value
     */
    public function filter($path, $data, callable $filter)
    {

    }
    
    /**
     * @param string $path
     * @param array|ArrayAccess $data
     * @param callable $filter
     * @param mixed $initial
     * @return Value
     */
    public function fold($path, $data, callable $filter, $initial)
    {

    }
    
    /**
     * @param string $path
     * @param array|ArrayAccess $data
     * @param mixed $value
     * @return Value
     */
    public function set($path, $data, $value)
    {

    }
    
    /**
     * @param string $path
     * @param array|ArrayAccess $data
     * @param mixed $value
     * @return Value
     */
    public function setIfEmpty($path, $data, $value)
    {

    }
    
    /**
     * @param string $path
     * @param array|ArrayAccess $data
     * @return array
     */
    public function remove($path, $data)
    {

    }

    /**
     * @param string $from
     * @param string $to
     * @param array|ArrayAccess $data
     * @return Value
     */
    public function move($from, $to, $data)
    {

    }

    /**
     * @param string $from
     * @param string $to
     * @param array|ArrayAccess $data
     * @return Value
     */
    public function copy($from, $to, $data)
    {

    }
}
