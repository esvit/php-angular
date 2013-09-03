<?php

namespace Bazalt\Angular\Directive;

use Analog\Analog;

class NgRepeat extends \Bazalt\Angular\Directive
{
    public function apply()
    {
        $attrs = $this->attributes();
        $attrValue = $attrs['ng-repeat'];
        if (!preg_match('|(?<item>.*)\s*in\s*(?<array>.*)|im', $attrValue, $matches)) {
            Analog::error(sprintf('Invalid value "%s" for ng-repeat directive', $attrValue));
            throw new \Exception(sprintf('Invalid value "%s" for ng-repeat directive', $attrValue));
            return;
        }
        $item = trim($matches['item']);
        $array = trim($matches['array']);

        //print_r($this->scope[$array]);
        $parent = $this->element->parentNode;
        
        $nodes = [];
        foreach ($this->scope[$array] as $value) {
            $node = $this->element->cloneNode(true);
            $parent->insertBefore($node, $this->element);
            
            $this->scope[$item] = $value;

            $node->removeAttribute('ng-repeat');
            $nodes []= $this->module->parser->parse($node, $this->scope);
        }
        $parent->removeChild($this->element);
        $this->node->nodes($nodes);
    }
}
