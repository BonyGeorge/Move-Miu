<?php

include_once 'database.php';
include_once 'crud.php';

class duration extends database implements crud {

    public $id;
    public $department_id;
    public $day;
    public $start;
    public $end;
    public $counter;

    public function create(array $data) {
        $sql = "INSERT INTO `duration`( `department_id`, `day_id`, `start`, `end`, `counter`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function delete(array $data) {
        
    }

    public function read(array $data) {
        $this->department_id = $data[0];
        $sql = "SELECT duration.*, day.name FROM `duration` INNER JOIN day ON duration.day_id = day.id WHERE `department_id`= '$this->department_id' AND duration.counter > 0 ORDER BY day_id ASC";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        if ($data[1] == 1) {
            $sql = "UPDATE duration SET counter = counter - 1 WHERE id = '$data[0]'";
        } else {
            $sql = "UPDATE duration SET counter = counter + 1 WHERE id = '$data[0]'";
        }
        $result = $this->booleanQuery($sql);
        return $result;
    }

}
