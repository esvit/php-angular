<?php

namespace Bazalt\Angular;

class DOMNode
{
    protected $element = null;

    protected $directives = [];

    protected $childNodes = [];

    public function __construct($element, $directives)
    {
        $this->element = $element;
        $this->directives = $directives;

        foreach ($directives as $directive) {
            $directive->node($this);
        }
    }

    public function apply()
    {
        foreach ($this->directives as $directive) {
            $directive->apply();
        }
        foreach ($this->childNodes as $node) {
            $node->apply();
        }
    }

    public function nodes($nodes)
    {
        $this->childNodes = $nodes;
    }
}