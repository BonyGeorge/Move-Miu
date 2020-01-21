<?php

include_once 'database.php';
include_once 'crud.php';
include_once 'duration.php';

class applicant extends database implements crud {

    public $id;
    public $uni_id;
    public $name;
    public $email;
    public $mobile;
    public $gender;
    public $faculty_id;
    public $department_id;
    public $duration_id;

    public function create(array $data) {
        $this->uni_id = $data[0];
        $this->name = $data[1];
        $this->email = $data[2];
        $this->mobile = $data[3];
        $this->gender = $data[4];
        $this->faculty_id = $data[5];
        $this->department_id = $data[6];
        $this->duration_id = $data[7];
        $sql = "INSERT INTO `applicant`( `uni_id`, `name`, `email`, `mobile`, `is_male`, `faculty_id`, `department_id`, `duration_id`) VALUES ('$this->uni_id','$this->name','$this->email','$this->mobile','$this->gender','$this->faculty_id','$this->department_id','$this->duration_id')";
        $result = $this->booleanQuery($sql);
        if ($result) {
            $d1 = new duration();
            $result = $d1->update(array($this->duration_id, 1));
        }
        return $result;
    }

    public function IDFound($id) {
        $sql = "SELECT * FROM `applicant` WHERE `uni_id` = '$id'";
        $result = $this->dataQuery($sql);
        if (!empty($result)) {
            return TRUE;
        }
        return FALSE;
    }

    public function checkUpdateID($id) {
        $sql = "SELECT * FROM `applicant` WHERE `uni_id` = '$id'";
        $result = $this->dataQuery($sql);
        if (!empty($result)) {
            foreach ($result as $value) {
                return $value['id'];
            }
        }
        return FALSE;
    }

    public function delete(array $data) {
        $this->id = $data[0];
        $sql = "SELECT `duration_id` FROM `applicant` WHERE `id`='$this->id'";
        $result = $this->dataQuery($sql);
        if (!empty($result)) {
            foreach ($result as $value) {
                $durationID = $value['duration_id'];
                $d1 = new duration();
                $result = $d1->update(array($durationID, 0));
                break;
            }
        }
        $sql = "DELETE FROM `applicant` WHERE `id`='$this->id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function read(array $data) {
        //userID
        $sql = "SELECT `applicant`.`id`, `applicant`.`uni_id`, `applicant`.`name`, `applicant`.`email`, `applicant`.`mobile`, `applicant`.`is_male`, `faculty`.`name` AS faculty, `department`.`name` AS department,`day`.`name` AS day, `duration`.`start`, `duration`.`end`, `applicant`.`status`, `applicant`.`faculty_id`, applicant.department_id, applicant.duration_id FROM ((((`applicant` INNER JOIN faculty ON applicant.faculty_id = faculty.id) INNER JOIN department ON applicant.department_id = department.id) INNER JOIN duration ON applicant.duration_id = duration.id) INNER JOIN day ON duration.day_id = day.id) WHERE $data[2] LIKE '%$data[3]%' ORDER BY day.id ASC LIMIT $data[0] OFFSET $data[1]";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        $this->uni_id = $data[0];
        $this->name = $data[1];
        $this->email = $data[2];
        $this->mobile = $data[3];
        $this->gender = $data[4];
        $this->faculty_id = $data[5];
        $this->department_id = $data[6];
        $this->duration_id = $data[7];
        $this->id = $data[8];
        $result = $this->delete(array($this->id));
        if ($result) {
            $result = $this->create($data);
        }
        return $result;
    }

}
