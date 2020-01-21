<?php

require_once 'database.php';
require_once 'crud.php';

class date extends database implements crud {

    public $id;
    public $date;
    public $time;
    
    public function create(array $data) {
        $this->date = $data[0];
        $this->time = $data[1];
        $sql = "INSERT INTO `date`(`date`, `time`) VALUES ('$this->date','$this->time')";
        $result = $this->booleanQuery($sql);
        return $result;
    }
    
    public function delete(array $data) {
        
    }
    
    public function getMaxID() {
        $sql = "SELECT max(`id`) FROM `date`";
        $result = $this->dataQuery($sql);
        if(!empty($result)){
            foreach ($result as $value) {
                $result = $value['max(`id`)'];
            }
        }
        return $result;
    }

    public function read(array $data) {
        $this->date = $data[0];
        $this->time = $data[1];
        $sql = "SELECT * FROM `date` WHERE `date`='$this->date' AND `time`='$this->time'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        
    }

//put your code here
}
