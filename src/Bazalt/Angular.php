<?php

namespace Bazalt;

class Angular
{
    protected $document = null;

    protected $filename = null;

    public $parser = null;
    
    protected $directives = [];

    public function directives()
    {
        return $this->directives;
    }

    public function document()
    {
        return $this->document;
    }

    public function directive($name, $func)
    {
        $this->directives[$name] = $func;
    }

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function html()
    {
        $this->document = new \DOMDocument();
        $this->document->loadHTMLFile($this->filename);

        $this->parser = new Angular\Parse($this);

        $rootScope = [
            'test' => '123',
            'yourName' => 'Vitalik',
            'items' => [
                '1', '2'
            ]
        ];

        $node = $this->parser->parse($this->document, $rootScope);
        $node->apply();

        return $this->document->saveHtml();
    }
}