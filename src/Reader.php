<?php

namespace Syhol\Spyglass;

use ArrayAccess;
use Syhol\Spyglass\Value\Just;
use Syhol\Spyglass\Value\JustList;
use Syhol\Spyglass\Value\Maybe;
use Syhol\Spyglass\Value\Nothing;

class Reader
{
    /**
     * @param string $path
     * @param array|ArrayAccess $data
     * @return Maybe
     */
    public function find($path, $data)
    {
        list($head, $tail) = $this->parsePath($path);

        if ($head === null || $head === '') {
            return new Just($data);
        }

        if (isset($data[$head])) {
            return empty($tail) ? new Just($data[$head]) : $this->find($tail, $data[$head]);
        }

        if ($head === '*') {
            $list = new JustList;
            foreach ($data as $item) {
                $list = $list->combine($this->find($tail, $item));
            }
            return $list;
        }

        return new Nothing;
    }

    public function parsePath($path)
    {
        $tail = explode('.', $path);
        $head = array_shift($tail);
        return [$head, implode('.', $tail)];
    }
}