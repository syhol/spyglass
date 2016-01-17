<?php

namespace Syhol\Spyglass\Value;

use Countable;
use IteratorAggregate;

interface Maybe extends Countable, IteratorAggregate
{
    /**
     * @param Maybe $other
     * @return JustList
     */
    public function combine(Maybe $other);

    /**
     * @return bool
     */
    public function exists();

    /**
     * @return array
     */
    public function all();

    /**
     * @return mixed
     */
    public function export();
}