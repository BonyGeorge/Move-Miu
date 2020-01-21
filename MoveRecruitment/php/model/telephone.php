<?php

class telephone extends database implements crud {

    public $id;
    public $user_id;
    public $telephone;
    public $title_id;

    public function create(array $data) {
        $this->user_id = $data[0];
        $this->telephone = $data[1];
        $sql = "INSERT INTO `telephone`(`user_id`, `telephone`) VALUES ('$this->user_id ',' $this->telephone')";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function createMultiple(array $data) {
        $this->user_id = $data[0];
        for ($i = 0; $i < count($data[1]); $i+=2) {
            $this->title_id = $data[1][$i];
            $this->telephone = $data[1][$i + 1];
            $sql = "INSERT INTO `telephone`(`user_id`, `telephone`, `title_id`) VALUES ('$this->user_id ',' $this->telephone','$this->title_id')";
            $result = $this->booleanQuery($sql);
        }
        return $result;
    }

    public function delete(array $data) {
        $this->id = $data[0];
        $sql = "DELETE FROM `telephone` WHERE `id`=$this->id ";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function read(array $data) {
        $this->id = $data[0];
        $sql = "SELECT * FROM `salary` WHERE `id`= '$data[0]'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        $this->user_id = $data[0];
        $this->telephone = $data[1];
        $this->title_id = $data[2];
        $sql = "UPDATE `telephone` SET `telephone`='$this->telephone' WHERE `user_id`= '$this->user_id' AND `title_id` = '$this->title_id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

//put your code here
}
