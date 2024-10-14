<?php

namespace Core;

class Request implements RequestInterface{
    public $get;
    public $post;

    public $headers;

    public $method;

    public $info;

    public $errors;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->headers = getallheaders();
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->info = $_SERVER;

    }
    public function get($key, $default = null) {
        return $_GET[$key] ?? $default;
    }

    public function post($key, $default = null) {
        return $_POST[$key] ?? $default;
    }

    public function all() {
        return array_merge($_GET, $_POST);
    }

    public function headers() {
        return getallheaders();
    }

    public function method() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function authorize()    
    {
        return true;
    }
}
