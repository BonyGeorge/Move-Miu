<?php

/**
 * Description of group
 *
 * @author mohamedswilam
 */
include_once 'database.php';
include_once 'crud.php';

class faculty implements crud {

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
        $sql = "SELECT * FROM `faculty` WHERE 1";
        $result = $this->database->dataQuery($sql);
        $faclties = array();
        if (!empty($result)) {
            foreach ($result as $value) {
                $f1 = new faculty();
                $f1->id = $value['id'];
                $f1->name = $value['name'];
                array_push($faclties, $f1);
            }
        }
        return $faclties;
    }

    public function update(array $data) {
        
    }

//put your code here
}
