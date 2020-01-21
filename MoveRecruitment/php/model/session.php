<?php

/**
 * Description of session
 *
 * @author mohamedswilam
 */
include_once 'database.php';
include_once 'crud.php';

class session implements crud {

    public $id;
    public $name;
    public $content;
    public $hw;

    function __construct() {
        $this->database = new database();
    }

    public function create(array $data) {
        $this->name = $data[0];
        $this->content = $data[1];
        $this->hw = $data[2];

        $sql = "INSERT INTO `session`(`name`, `content`, `homework`) VALUES ('$this->name','$this->content','$this->hw')";
        $result = $this->database->booleanQuery($sql);
        return $result;
    }

    public function delete(array $data) {
        $this->id = $data[0];
        $sql = "DELETE FROM `session` WHERE `id`='$this->id'";
        $result = $this->database->booleanQuery($sql);
        return $result;
    }

    public function read(array $data) {
        $searchBy = $data[0];
        $value = $data[1];

        $sql = "SELECT * FROM `session` WHERE `$searchBy` LIKE '%$value%'";
        $result = $this->database->dataQuery($sql);
        $sessions = array();
        if (!empty($result)) {
            foreach ($result as $value) {
                $g1 = new session();
                $g1->id = $value['id'];
                $g1->name = $value['name'];
                $g1->content = $value['content'];
                $g1->hw = $value['homework'];
                array_push($sessions, $g1);
            }
        }
        return $sessions;
    }

    public function update(array $data) {
        $this->id = $data[0];
        $this->name = $data[1];
        $this->content = $data[2];
        $this->hw = $data[3];
        $sql = "UPDATE `session` SET `name`='$this->name',`content`='$this->content',`homework`='$this->hw' WHERE `id`='$this->id'";
        $result = $this->database->booleanQuery($sql);
        return $result;
    }
}