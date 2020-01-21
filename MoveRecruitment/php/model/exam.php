<?php

include_once 'database.php';
include_once 'crud.php';

class exam extends database implements crud {

    public $id;
    public $type_id;
    public $lecture_id;

    public function create(array $data) {
        $this->type_id = $data[0];
        $this->lecture_id = $data[1];
        $sql = "INSERT INTO `exam`(`type_id`, `lecture_id`) VALUES ('$this->type_id','$this->lecture_id')";
        $result = $this->booleanQuery($sql);
        if ($result) {
            $sql = "SELECT max(`id`) FROM `exam` WHERE 1";
            $result2 = $this->dataQuery($sql);
            if (!empty($result2)) {
                foreach ($result2 as $value) {
                    $examID = $value['max(`id`)'];
                }
                $result = $this->createStudentsExamSheet($this->lecture_id, $examID);
            }
        }
        return $result;
    }

    public function createStudentsExamSheet($lectureID, $examID) {
        
        $sql = "SELECT * FROM `attendance_sheet` WHERE `lecture_id` = '$lectureID' AND `attend`='1'";
        $result = $this->dataQuery($sql);
        if (!empty($result)) {
            $sql = "INSERT INTO `exam_student`( `student_id`, `exam_id`) VALUES ";
            $ctr = 0;
            foreach ($result as $value) {
                $studentID = $value['user_id'];
                if (count($result) - 1 == $ctr) {
                    $sql .= "('$studentID','$examID')";
                } else {
                    $sql .= "('$studentID','$examID'), ";
                    $ctr++;
                }
            }
            $result = $this->booleanQuery($sql);
            return $result;
        } else {
            return TRUE;
        }
    }

    public function delete(array $data) {
        $sql = "DELETE FROM `exam` WHERE `id`='$data[0]'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function read(array $data) {
        $this->lecture_id = $data[0];
        $search = $data[1];
        $value = $data[2];
        $this->booleanQuery("SET CHARACTER SET utf8;");
        $sql = "SELECT exam_student.id,user.real_id, user.name, exam.type_id, exam_type.type, `exam_student`.`score`, exam_type.max_score, exam.id AS examID, exam_type.min_score FROM ((( `exam_student` INNER JOIN user ON exam_student.student_id = user.id) INNER JOIN exam on exam_student.exam_id = exam.id) INNER JOIN exam_type ON exam.type_id = exam_type.id) WHERE exam.lecture_id = '$this->lecture_id' AND $search LIKE '%$value%' ORDER BY examID ASC";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function search($searchBy, $value) {
        if ($searchBy == "name") {
            $searchBy = "room.name";
        } else {
            $searchBy = "room_type.type_name";
        }
        $this->booleanQuery("SET CHARACTER SET utf8;");
        $sql = "SELECT room.id, room.name, room_type.type_name FROM `room` INNER JOIN `room_type` WHERE room.type_id = room_type.id AND $searchBy LIKE '%$value%'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function readRoomInfo($roomID) {
        $sql = "SELECT `name`, `type_id` FROM `room` WHERE `id`='$roomID'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        $sql = "UPDATE `exam_student` SET `score`='$data[1]' WHERE `id`='$data[0]'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

}
