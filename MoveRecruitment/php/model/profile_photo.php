<?php

include_once 'database.php';
include_once 'crud.php';

class profile_photo extends database implements crud {

    public $id;
    public $user_id;
    public $url;

    public function create(array $data) {
        $this->user_id = $data[0];
        $this->url = $data[1];
        $sql = "INSERT INTO `profile_photo`(`user_id`, `url`) VALUES ('$this->user_id','$this->url')";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function delete(array $data) {
        
    }

    public function read(array $data) {
        $this->user_id = $data[0];
        $sql = "SELECT `url` FROM `profile_photo` WHERE `user_id`='$this->user_id'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        
    }

//put your code here
}
