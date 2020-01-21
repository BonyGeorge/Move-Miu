<?php

/**
 * Description of group
 *
 * @author mohamedswilam
 */
include_once 'database.php';
include_once 'crud.php';

class department implements crud {

    public $id;
    public $name;
    public $database;

    function __construct() {
        $this->database = new database();
    }

    public function create(array $data) {
        
    }

    public function delete(array $data) {
        
    }

    public function read(array $data) {
        $sql = "SELECT * FROM `department` WHERE 1";
        $result = $this->database->dataQuery($sql);
        $departments = array();
        if (!empty($result)) {
            foreach ($result as $value) {
                $d1 = new department();
                $d1->id = $value['id'];
                $d1->name = $value['name'];
                array_push($departments, $d1);
            }
        }
        return $departments;
    }

    public function update(array $data) {
        
    }

//put your code here
}
