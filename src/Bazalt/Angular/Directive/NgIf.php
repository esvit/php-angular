<?php

namespace Bazalt\Angular\Directive;

class NgIf extends \Bazalt\Angular\Directive
{
    public function apply()
    {
        $attrs = $this->attributes();
        $attrValue = $attrs['ng-if'];

        $value = $this->scope->getValue($attrValue);
        $this->element->removeAttribute('ng-if');
        if (!$value) {
            $parent = $this->element->parentNode;
            $parent->removeChild($this->element);
        }
    }
}
