<?php

namespace Bazalt\Angular\Directive;

class NgModel extends \Bazalt\Angular\Directive
{
    public function apply()
    {
        $attrs = $this->attributes();
        $attrValue = $attrs['ng-model'];

        $this->element->setAttribute('value', $this->scope[$attrValue]);
    }
}