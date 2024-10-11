<?php

namespace Core;

use Exception;

class App
{
    private static $instance = null;

    protected $bindings = [];

    protected $singletons = [];

    private function __construct() {}

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }


    public function singleton($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
        //the resolver is null by default initially 
        $this->singletons[$key] = null;
    }

    public function make($key)
    {
        //Check if it is a singleton
        if (isset($this->singletons[$key])) {
            if ($this->singletons[$key] === null) {
                $this->singletons[$key] = $this->resolve($key);
            }
            return $this->singletons[$key];
        }

        return $this->resolve($key);
    }

    protected function resolve($key)
    {
        if (isset($this->bindings[$key])) {
            $resolver = $this->bindings[$key];
            if (is_callable($resolver)) {
                return $resolver($this);
            }
            return new $resolver();
        }

        throw new Exception("No binding found for '{$key}'");
    }

    private function __clone() {}
    private function __wakeup() {}

}
