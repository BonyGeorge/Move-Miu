<?php

class school extends database implements crud {

    public $id;
    public $user_id;
    public $school;

    public function create(array $data) {
        $this->user_id = $data[0];
        $this->school = $data[1];
        $sql = "INSERT INTO `school`(`user_id`, `school`) VALUES ('$this->user_id ',' $this->school')";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function createMultiple(array $data) {
        $this->user_id = $data[0];
        for ($i = 0; $i < count($data[1]); $i+=2) {
            $this->title_id = $data[1][$i];
            $this->school = $data[1][$i + 1];
            $sql = "INSERT INTO `school`(`user_id`, `school`, `title_id`) VALUES ('$this->user_id ',' $this->school','$this->title_id')";
            $result = $this->booleanQuery($sql);
        }
        return $result;
    }

    public function delete(array $data) {
        $this->id = $data[0];
        $sql = "DELETE FROM `school` WHERE `id`=$this->id ";
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
        $this->school = $data[1];
        $sql = "UPDATE `school` SET `school`='$this->school' WHERE `user_id`= $this->user_id";
        $result = $this->booleanQuery($sql);
        return $result;
    }

//put your code here
}
