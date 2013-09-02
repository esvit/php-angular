<?php

namespace Bazalt\Angular;

abstract class Directive
{
    abstract function apply();

    protected $scope = null;

    protected $angular = null;

    protected $node = null;

    public function __construct($element, $scope, $angular)
    {
        $this->scope = $scope;
        $this->element = $element;
        $this->angular = $angular;
    }

    public function link(\DOMElement $element)
    {
    }

    public function node($node)
    {
        $this->node = $node;
    }

    public function attributes()
    {
        $attributes = [];
        for ($j = 0; $j < $this->element->attributes->length; $j++) {
            $attribute = $this->element->attributes->item($j);
            $attributes[$attribute->name] = $attribute->value;
        }
        return $attributes;
    }
}