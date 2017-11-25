<?php

namespace Bazalt\Angular\Directive;

class NgBind extends \Bazalt\Angular\Directive
{
    protected function parseValue($matches)
    {
        $key = trim($matches['value']);
        $filters = isset($matches['filters']) ? explode('|', trim($matches['filters'], ' |')) : [];

        $value = $this->scope->getValue($key);
        if (!$value) {
            return $matches[0];
        }
        return $value;
    }

    public function apply()
    {
        $this->element->nodeValue = preg_replace_callback('|{{\s*(?<value>[a-z0-9\.]*)\s*(\|\s*(?<filters>.*))?\s*}}|im', [$this, 'parseValue'], $this->element->wholeText);
    }
}