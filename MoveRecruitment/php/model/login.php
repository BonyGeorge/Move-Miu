<?php

include_once 'database.php';
include_once 'crud.php';

class login extends database implements crud {

    //put your code here
    public function create(array $data) {
        
    }

    public function delete(array $data) {
        
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function read(array $data) {
        //username,password
        $data[0] = $this->test_input($data[0]);
        $data[1] = $this->test_input($data[1]);
        $sql = "SELECT `userid` FROM `user_login` WHERE `username`='$data[0]' AND `password`='$data[1]'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        
    }

}
?>
