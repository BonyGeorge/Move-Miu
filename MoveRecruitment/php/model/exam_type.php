

<?php

include_once 'database.php';
include_once 'crud.php';

class exam_type extends database implements crud {

    public function create(array $data) {
        $sql = "INSERT INTO `exam_type`(`type`, `max_score`, `min_score`) VALUES ('$data[0]', '$data[1]', $data[2])";
        $result = $this->booleanQuery($sql);
        if ($result == 1) {
            $sqlTypeID = "SELECT max(`id`) FROM `exam_type`";
            $result = $this->dataQuery($sqlTypeID);
            if (!empty($result)) {
                foreach ($result as $value) {
                    $id = $value['max(`id`)'];
                    return $id;
                }
            }
        }
        return $result;
    }

    public function delete(array $data) {
        $sql = "DELETE FROM `exam_type` WHERE `id`='$data[0]'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function read(array $data) {
        $sql = "SELECT * FROM `exam_type` WHERE 1";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        
    }

//put your code here
}
