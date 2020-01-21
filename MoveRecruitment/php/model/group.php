<?php

/**
 * Description of group
 *
 * @author mohamedswilam
 */
include_once 'database.php';
include_once 'crud.php';

class group implements crud {

    public $id;
    public $name;
    public $center;
    public $database;

    function __construct() {
        $this->database = new database();
    }

    public function create(array $data) {
        $this->name = $data[0];
        $this->center = $data[1];

        $sql = "INSERT INTO `group`(`name`, `center`) VALUES ('$this->name','$this->center')";
        $result = $this->database->booleanQuery($sql);
        return $result;
    }

    public function delete(array $data) {
        $this->id = $data[0];
        $sql = "DELETE FROM `group` WHERE `id`='$this->id'";
        $result = $this->database->booleanQuery($sql);
        return $result;
    }

    public function read(array $data) {
//        $this->id = $data[0];
        $searchBy = $data[0];
        $value = $data[1];
        
        $sql = "SELECT * FROM `group` WHERE `$searchBy` LIKE '%$value%'";
        $result = $this->database->dataQuery($sql);
        $centers = array();
        if(!empty($result)){
            foreach ($result as $value) {
                $g1 = new group();
                $g1->id = $value['id'];
                $g1->name = $value['name'];
                $g1->center = $value['center'];
                array_push($centers, $g1);
            }
        }
        return $centers;
    }

    public function update(array $data) {
        $this->id = $data[0];
        $this->name = $data[1];
        $this->center = $data[2];
        $sql = "UPDATE `group` SET `name`='$this->name',`center`='$this->center' WHERE `id`='$this->id'";
        $result = $this->database->booleanQuery($sql);
        return $result;
    }

//put your code here
}
