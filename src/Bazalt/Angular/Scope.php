<?php

namespace Bazalt\Angular;

class Scope implements \ArrayAccess
{
    protected $variables = null;

    protected $parent = null;

    public function __construct($variables)
    {
        $this->variables = $variables;
    }

    public function newScope()
    {
        $scope = new Scope();
        $scope->parent = $this;

        return $scope;
    }

    public function offsetExists($offset)
    {
        return isset($this->variables[$offset]);
    }

    public function offsetGet($offset)
    {
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