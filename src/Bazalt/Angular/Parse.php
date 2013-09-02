<?php

namespace Bazalt\Angular;

class Parse
{
    protected $angular = null;

    public function __construct($angular)
    {
        $this->angular = $angular;
    }

    public function parse(\DOMNode $node, $scope)
    {
        $directive = $this->detectDirective($node, $scope);

        $nodes = [];
        // traverse nodes
        if ($node->childNodes) {
            for ($i = 0; $i < $node->childNodes->length; $i++) {
                $childNode = $node->childNodes->item($i);

                $nodes []= $this->parse($childNode, $scope);
            }
        }
        $directive->nodes($nodes);
        return $directive;
    }

    protected function detectDirective(\DOMNode $node, $scope)
    {
        $directives = $this->angular->directives();
        $nodeDirectives = [];

        // if element - check attributes
        if ($node instanceof \DOMElement) {
            for ($j = 0; $j < $node->attributes->length; $j++) {
                $attribute = $node->attributes->item($j);
                foreach ($directives as $name => $directive) {
                    if (strpos($directive['restrict'], 'A') !== false) {
                        if ($name == $attribute->name) {
                            $nodeDirectives []= new $directive['class']($node, $scope, $this);
                        }
                    }
                }
            }
        }
        // text
        if ($node instanceof \DOMText) {
            $nodeDirectives []= new Directive\NgBind($node, $scope, $this);
        }

        return new DOMNode($node, $nodeDirectives);
    }
}