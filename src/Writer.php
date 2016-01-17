<?php

namespace Syhol\Spyglass;

use ArrayAccess;

class Writer
{
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