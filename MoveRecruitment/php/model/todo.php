<?php
include_once 'database.php';
include_once 'crud.php';

class todo extends database implements crud {

    private $id;
    private $userID;
    private $title;
    private $status;

    public function create(array $data) {
        //userID, title, status
        $this->userID = $data[0];
        $this->title = $data[1];
        $sql = "INSERT INTO `todo`(`user_id`, `title`, `status`) VALUES ('$this->userID','$this->title','1')";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function delete(array $data) {
        $this->id = $data[0];
        $sql = "DELETE FROM `todo` WHERE `id`='$this->id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function read(array $data) {
        
        $this->userID = $data[0];
        $sql = "SELECT * FROM `todo` WHERE `user_id`='$this->userID'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        $this->id = $data[0];
        $this->status = $data[1];
        $sql = "UPDATE `todo` SET `status`='$this->status' WHERE `id`='$this->id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

//put your code here
}
?>