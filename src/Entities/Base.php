<?php

namespace DenizTezcan\SendCloud\Entities;

class Base
{
    protected $attributes = [];

    public function __construct($attributes = [])
    {
        foreach ($attributes as $key => $value) {
            $this->set($key, $value);
        }
    }

    public function set($key = '', $value = '')
    {
        $this->attributes[$key] = $value;
    }

    public function get($key = '')
    {
        if (isset($this->attributes[$key])) {
            return $this->attributes[$key];
        }

        return null;
    }
}
