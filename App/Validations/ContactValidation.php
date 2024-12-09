<?php

namespace App\Helpers;

class ContactValidation
{
    public static function set($type, $message)
    {
        if (!isset($_SESSION)) {
            session_start(); // Bắt đầu session nếu chưa được khởi tạo
        }
        $_SESSION['notification'] = [
            'type' => $type,
            'message' => $message,
        ];
    }

    public static function get()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        return $_SESSION['notification'] ?? null;
    }

    public static function unset()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION['notification']);
    }
}
