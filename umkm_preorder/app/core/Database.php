<?php

class Database {
    private $host = "localhost";
    private $db = "umkm_preorder";
    private $user = "root";
    private $pass = "";

    public function connect() {
        return new PDO(
            "mysql:host=$this->host;dbname=$this->db;charset=utf8",
            $this->user,
            $this->pass
        );
    }
}
