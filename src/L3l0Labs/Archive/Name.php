<?php

namespace L3l0Labs\Archive;

final class Name
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function name()
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }

    public static function create($name)
    {
        return new self($name);
    }
}
