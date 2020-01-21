<?php

/**
 * Description of lecture
 *
 * @author mohamedswilam
 */
include_once 'database.php';
include_once 'crud.php';
include_once 'attendence_sheet.php';

class lecture implements crud {

    public $id;
    public $group_id;
    public $session_id;
    public $date;
    public $start_time;
    public $end_time;
    public $max_num_of_students;
    public $database;
    public $attendence_sheet;
    public $status_id;

    function __construct() {
        $this->database = new database();
        $this->attendence_sheet = new attendence_sheet();
    }

    public function create(array $data) {
        $this->group_id = $data[0];
        $this->session_id = $data[1];
        $this->date = $data[2];
        $this->start_time = $data[3];
        $this->end_time = $data[4];
        $this->max_num_of_students = $data[5];
        $sql = "INSERT INTO `lecture`(`group_id`, `session_id`, `date`, `start_time`, `end_time`, `max_num_of_students`) VALUES ('$this->group_id','$this->session_id','$this->date','$this->start_time','$this->end_time','$this->max_num_of_students')";
        $result = $this->database->booleanQuery($sql);
        if ($result) {
            $result = $this->createAttendenceSheet();
            return $result;
        } else {
            return $result;
        }
    }

    public function createAttendenceSheet() {
        $sql = "SELECT max(`id`), `group_id` FROM `lecture` WHERE id = (SELECT max(`id`) FROM `lecture`)";
        $result = $this->database->dataQuery($sql);
        if (!empty($result)) {
            foreach ($result as $value) {
                $lectureID = $value['max(`id`)'];
                $groupID = $value['group_id'];
            }
            $sql = "SELECT * FROM `student_group` WHERE `group_id`='$groupID'";
            //INSERT INTO `attendance_sheet` (`user_id`, `lecture_id`) VALUES ('98', '1'), ('99', '1');
            $result = $this->database->dataQuery($sql);
            $insertingSQL = "INSERT INTO `attendance_sheet` (`user_id`, `lecture_id`) VALUES ";
            if (!empty($result)) {
                $ctr = 0;
                foreach ($result as $value) {
                    $userID = $value['user_id'];
                    if (count($result) - 1 == $ctr) {
                        $insertingSQL .= "('$userID', '$lectureID')";
                    } else {
                        $insertingSQL .= "('$userID', '$lectureID'), ";
                        $ctr++;
                    }
                }
                $result = $this->database->booleanQuery($insertingSQL);
                return $result;
            } else {
                return TRUE;
            }
        }
        return $result;
    }

    public function delete(array $data) {
        $this->id = $data[0];
        $sql = "DELETE FROM `lecture` WHERE `id`='$this->id'";
        $result = $this->database->booleanQuery($sql);
        return $result;
    }

    public function read(array $data) {
        $sql = "SELECT lecture.*, session.name AS session, session.id AS sessionID, session.content, session.homework, lecture_status.status, `group`.`name` AS `group`, `group`.`id` AS `groupID`  FROM (((lecture INNER JOIN `group` ON lecture.group_id = `group`.`id`) INNER JOIN session ON lecture.session_id = session.id) INNER JOIN lecture_status ON lecture.status_id = lecture_status.id) WHERE $data[0] LIKE '%$data[1]%'";
        $result = $this->database->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        $sql = "UPDATE `lecture` SET `session_id`='$data[1]',`date`='$data[2]',`start_time`='$data[3]',`end_time`='$data[4]',`max_num_of_students`='$data[5]' WHERE `id`='$data[0]'";
        $result = $this->database->booleanQuery($sql);
        return $result;
    }

    public function updateStatus(array $data) {
        $this->status_id = $data[0];
        $this->lectureID = $data[1];
        $sql = "UPDATE `lecture` SET `status_id`='$this->status_id' WHERE `id`='$this->lectureID'";
        $result = $this->database->booleanQuery($sql);
        return $result;
    }

//put your code here
}
