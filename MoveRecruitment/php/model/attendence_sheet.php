<?php

/**
 * Description of attendence_sheet
 *
 * @author mohamedswilam
 */
include_once 'database.php';
include_once 'crud.php';

class attendence_sheet implements crud {

    public $id;
    public $user_id;
    public $lecture_id;
    public $attend;
    public $database;

    function __construct() {
        $this->database = new database();
    }

    public function create(array $data) {
        $this->user_id = $data[0];
        $this->lecture_id = $data[1];
        $this->attend = $data[2];
        $sql = "INSERT INTO `attendance_sheet`( `user_id`, `lecture_id`, `attend`) VALUES ('$this->user_id','$this->lecture_id','$this->attend')";

        $result = $this->database->booleanQuery($sql);

        return $result;
    }

    public function addToExamsList($userID, $lectureID) {
        $sql = "SELECT * FROM `exam` WHERE `lecture_id`='$lectureID'";
        $result = $this->database->dataQuery($sql);
        if (!empty($result)) {
            foreach ($result as $value) {
                $examid = $value['id'];
                $sql = "INSERT INTO `exam_student`( `student_id`, `exam_id`) VALUES ('$userID','$examid')";
                $addResult = $this->database->booleanQuery($sql);
            }
            return $addResult;
        } else {
            return TRUE;
        }
    }

    public function removeFromExamList($userID, $lectureID) {
        $sql = "SELECT `exam_student`.* FROM `exam_student` INNER JOIN exam ON exam.id = exam_student.exam_id AND exam.lecture_id = '$lectureID' WHERE `student_id`= '$userID'";
        $result = $this->database->dataQuery($sql);
        if (!empty($result)) {
            foreach ($result as $value) {
                $id = $value['id'];
                $sql = "DELETE FROM `exam_student` WHERE `id`='$id'";
                $deleteResult = $this->database->booleanQuery($sql);
            }
            return $deleteResult;
        } else {
            return TRUE;
        }
    }

    public function delete(array $data) {
        
    }

    public function read(array $data) {
        $this->lecture_id = $data[0];
        $this->database->booleanQuery("SET CHARACTER SET utf8;");
        $sql = "SELECT attendance_sheet.*, user.name, user.real_id FROM `attendance_sheet` INNER JOIN user ON attendance_sheet.user_id = user.id WHERE lecture_id = '$this->lecture_id' AND $data[1] LIKE '%$data[2]%'";
        $result = $this->database->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        $this->lecture_id = $data[0];
        $this->user_id = $data[1];
        $this->attend = $data[2];
        $sql = "UPDATE `attendance_sheet` SET `attend`='$this->attend' WHERE `user_id`='$this->user_id ' AND `lecture_id`='$this->lecture_id'";
        $result = $this->database->booleanQuery($sql);

        if ($result) {
            if ($this->attend == 1) {
                $result = $this->addToExamsList($this->user_id, $this->lecture_id);
            } else {
                $result = $this->removeFromExamList($this->user_id, $this->lecture_id);
            }
        }
        return $result;
    }

    public function readOutterStudents($groupID, $sessionID, $searchBy, $value) {
        $this->database->booleanQuery("SET CHARACTER SET utf8;");
        $sql = "SELECT user.real_id,user.name, attendance_sheet.*, student_group.group_id AS studentGroup,lecture.group_id AS lectureGroup FROM (((`attendance_sheet` INNER JOIN lecture ON lecture.id = attendance_sheet.lecture_id AND lecture.status_id != '3' AND lecture.session_id = '$sessionID') INNER JOIN student_group ON attendance_sheet.user_id = student_group.user_id AND student_group.group_id != '$groupID') INNER JOIN user ON attendance_sheet.user_id = user.id) WHERE $searchBy LIKE '%$value%'";
        $result = $this->database->dataQuery($sql);
        return $result;
    }

    public function addOutterStudents($userID, $realLectureID, $newLectureID) {
        $sql = "UPDATE `attendance_sheet` SET `lecture_id`='$realLectureID',`is_inner`='0' WHERE `user_id`='$userID' AND `lecture_id`='$newLectureID'";
        $result = $this->database->booleanQuery($sql); //112 9 4
        return $result;
    }

    public function removeOutterStudents($userID, $sessionID, $groupID, $oldLectureID) {
        $sql = "SELECT `id` FROM `lecture` WHERE `group_id`='$groupID' AND `session_id`='$sessionID'";
        $result = $this->database->dataQuery($sql);
        if (!empty($result)) {
            foreach ($result as $value) {
                $newLectureID = $value['id'];
            }
        }
        $sql = "UPDATE `attendance_sheet` SET `lecture_id`='$newLectureID',`is_inner`='1' WHERE `user_id`='$userID' AND `lecture_id`='$oldLectureID'";
        $result = $this->database->booleanQuery($sql);
        return $result;
    }

//put your code here
}
