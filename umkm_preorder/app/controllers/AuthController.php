<?php
require_once '../app/models/User.php';

class AuthController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $data = $user->login($_POST['username'], $_POST['password']);

            if ($data) {
                $_SESSION['user'] = $data;
                header("Location: " . BASE_URL . "produk");
                exit;
            }
        }
        require_once '../app/views/auth/login.php';
    }

    public function logout() {
        session_destroy();
        header("Location: " . BASE_URL . "auth/login");
        exit;
    }
}
