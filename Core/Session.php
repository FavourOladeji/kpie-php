<?php

namespace Core;

class Session{
    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $default;
    }
}
