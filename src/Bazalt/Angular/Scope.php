<?php

namespace Bazalt\Angular;

class Scope implements \ArrayAccess
{
    protected $variables = null;

    /** @var Scope */
    protected $parent = null;

    public function __construct($variables = [], $parent = null)
    {
        $this->variables = $variables;
        $this->parent = $parent;
    }

    public function newScope()
    {
        $scope = new Scope();
        $scope->parent = $this;

        return $scope;
    }

    public function getValue($compositeKey) {
        $root = $this;

        $keys = explode('.', $compositeKey);
        while(count($keys) > 0) {
            $key = array_shift($keys);
            if(!isset($root[$key])) {
                return null;
            }
            $root = $root[$key];
        }
        return $root;
    }

    public function offsetExists($offset)
    {
        $localExists = isset($this->variables[$offset]);
        $parentExists = isset($this->parent) && $this->parent->offsetExists($offset);

        return $localExists || $parentExists;
    }

    public function offsetGet($offset)
    {
        if (!isset($this->variables[$offset]) && $this->parent) {
            return $this->parent->offsetGet($offset);
        }
        return $this->variables[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->variables[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->variables[$offset]);
    }
}