<?php

class Auth {

    public static function check() {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "auth/login");
            exit;
        }
    }

    public static function admin() {
        self::check();

        if (($_SESSION['user']['role'] ?? '') !== 'admin') {
            header("Location: " . BASE_URL . "produk");
            exit;
        }
    }
}
