<?php

include_once 'database.php';
include_once 'crud.php';

class user_login extends database implements crud {

    private $id;
    private $user_name;
    private $password;
    private $userid;

    public function create(array $data) {
        $this->user_name = $data[0];
        $this->password = $data[1];
        $this->userid = $data[2];
        $sql = "INSERT INTO `user_login`(`username`, `password`, `userid`) VALUES ('$this->user_name','$this->password','$this->userid')";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function delete(array $data) {
        $this->id = $data[0];
        $sql = "DELETE FROM `user_login` WHERE `id`='$this->id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function read(array $data) {
        $this->id = $data[0];
        $sql = "SELECT * FROM `user_login` WHERE `id`='$this->id'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        $this->id = $data[0];
        $this->user_name = $data[1];
        $this->password = $data[2];
        $this->userid = $data[3];
        $sql="UPDATE `user_login` SET `username`='$this->user_name',`password`='$this->password',`userid`='$this->userid' WHERE `id`='$this->id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function login(array $data){
        $sql = "SELECT * FROM `user`  INNER JOIN `user_type`on user.type_id = user_type.id AND user.id='$data[0]'";
        $result = $this->dataQuery($sql);
        return $result;
    }
}
