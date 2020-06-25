<?php

class database {

    //put your code here
    private $server = "server116.web-hosting.com";
    private $user = 'movegvka_Move2020';
    private $pass = 'Admin2020';
    private $db = 'movegvka_move_recruitment';
    private $conn;
    private static $_instance;

    public function __construct() {
        if (!self::$_instance) {
            $this->conn = new mysqli($this->server, $this->user, $this->pass, $this->db);
            if ($this->conn->connect_error)
                die($this->conn->connect_error);
        }
    }

    private function connect() {
        return $this->conn;
    }

    public static function getInstance() {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function close() {
        $this->conn->close();
    }

    private function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function booleanQuery($sql) {
        $DB = database::getInstance();
        $connction = $DB->connect();
        $result = $connction->query($sql);
        return $result;
    }

    public function dataQuery($sql) {
        $DB = database::getInstance();
        $connction = $DB->connect();
        $result = $connction->query($sql);
        $data = NULL;
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function datafetch($sql) {
        $DB = database::getInstance();
        $connction = $DB->connect();
        $result = $connction->query($sql);
        return mysqli_fetch_all($result);
    }

}
