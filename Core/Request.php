<?php

namespace Core;

class Request {
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
}
