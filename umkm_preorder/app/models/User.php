<?php
require_once '../app/core/Database.php';

class User {
    public function login($username, $password) {
        $db = (new Database())->connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
