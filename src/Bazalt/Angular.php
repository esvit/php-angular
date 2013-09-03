<?php

namespace Bazalt;

class Angular
{
    protected $modules = [];

    public function module($name, $options = null)
    {
        if ($options !== null) {
            $this->modules[$name] = new Angular\Module($name, $options);
            return $this->modules[$name];
        }
        if (isset($this->modules[$name])) {
            return $this->modules[$name];
        }
        return null;
    }

    public function bootstrap($name)
    {
        $module = $this->modules[$name];
        return $module->html();
    }
}