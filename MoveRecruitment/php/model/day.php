<?php

include_once 'database.php';
include_once 'crud.php';

class day extends database implements crud {

    public function create(array $data) {
        
    }

    public function delete(array $data) {
        
    }

    public function read(array $data) {
        $sql="SELECT * FROM `day`";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        
    }

//put your code here
}
