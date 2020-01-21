<?php

include_once 'database.php';
include_once 'crud.php';

class email extends database implements crud {

    public $id;
    public $user_id;
    public $email;

    public function create(array $data) {
        $this->user_id = $data[0];
        $this->email = $data[1];
        $sql = "INSERT INTO `email`(`user_id`, `email`) VALUES ('$this->user_id','$this->email')";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function delete(array $data) {
        $this->id = $data[0];
        $sql="DELETE FROM `address` WHERE `id`='$this->id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function read(array $data) {
        $this->id = $data[0];
        $sql="SELECT * FROM `email` WHERE `id`='$this->id'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        $this->user_id = $data[0];
        $this->email = $data[1];
        $sql="UPDATE `email` SET `email`='$this->email' WHERE `user_id`='$this->user_id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

}
