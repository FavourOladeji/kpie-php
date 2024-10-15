<?php

namespace Core\Requests;

class Request implements RequestInterface{
    public $get;
    public $post;

    public $headers;

    public $method;

    public $info;

    public $attributes;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->headers = getallheaders();
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->info = $_SERVER;
        $this->attributes = static::attributes();

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

    public static function attributes()
    {
        switch (strtoupper($_SERVER['REQUEST_METHOD'])) {
            case 'GET':
                return $_GET;
            case 'POST':
                return $_POST;
            // case 'PUT':
            //     parse_str(file_get_contents('php://input'), $this->attributes);
            //     break;
            // Add more methods if necessary
            default:
               return [];
        }
    }

}
