<?php

namespace Bazalt\Angular;

class Module
{
    protected $document = null;

    protected $name = null;

    protected $options = null;

    public $parser = null;

    public $rootScope = null;
    
    protected $directives = [];

    public function __construct($name, $options)
    {
        $this->name = $name;
        $this->options = $options;
        $this->rootScope = new Scope();
    }

    public function directives()
    {
        return $this->directives;
    }

    public function options()
    {
        return $this->options;
    }

    public function directive($name, $func)
    {
        $this->directives[$name] = $func;
    }

    public function html()
    {
        $filename = $this->options['dir'] . DIRECTORY_SEPARATOR . $this->options['file'];

        $this->document = new \DOMDocument();
        $this->document->loadHTMLFile($filename);

        $this->parser = new Parse($this);

        $node = $this->parser->parse($this->document, $this->rootScope);
        $node->apply();

        return $this->document->saveHtml();
    }
}