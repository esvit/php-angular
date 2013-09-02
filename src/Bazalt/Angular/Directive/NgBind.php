<?php

namespace Bazalt\Angular\Directive;

class NgBind extends \Bazalt\Angular\Directive
{
    protected function parseValue($matches)
    {
        $value = trim($matches['value']);
        $filters = explode('|', trim($matches['filters'], ' |'));
        //print_R($filters);
        if (!isset($this->scope[$value])) {
            return '{{' . $matches['value'] . '}}';
        }
        return $this->scope[$value];
    }

    public function apply()
    {
        $this->element->nodeValue = preg_replace_callback('|{{\s*(?<value>[a-z0-9]*)\s*(?<filters>.*)?\s*}}|im', [$this, 'parseValue'], $this->element->wholeText);
    }
}