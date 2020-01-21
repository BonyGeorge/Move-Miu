<?php

include_once 'user.php';
include_once 'email.php';
include_once 'telephone.php';
include_once 'address.php';
include_once 'user_login.php';
include_once 'school.php';

class student extends user {

    public $email;
    public $userLogin;
    public $telephone;
    public $address;
    public $school;

    function __construct() {
        $this->userLogin = new user_login();
        $this->email = new email();
        $this->telephone = new telephone();
        $this->address = new address();
        $this->school = new school();
    }

    public function newStudent(array $data) {
        //name, mobile, address, dob, gender, school, realid, "", groupID
        $result = $this->address->create($data[2]);
        $uniquePassword = uniqid();
        if ($result != FALSE) {
            $user = array($data[0], $data[3], $data[4], $result, "3", "1", $data[6]);
            $result = $this->create($user);
            if ($result == 1) {
                $sql = "SELECT max(`id`), `name` FROM `user` WHERE `id`= (SELECT max(`id`) FROM `user` WHERE 1)";
                $result = $this->dataQuery($sql);
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $username = $value['name'] . $value['max(`id`)'];
                        $userid = $value['max(`id`)'];
                    }
                    $userLoginData = array($data[6], $uniquePassword, $userid);
                    $result = $this->userLogin->create($userLoginData);
                    if ($result == 1) {
                        $telephone = array($userid, $data[1]);
                        $result = $this->telephone->createMultiple($telephone);
                        if ($result == 1) {
                            $school = array($userid, $data[5]);
                            $result = $this->school->create($school);
                            if ($result == 1) {
                                $sql = "INSERT INTO `student_group`(`user_id`, `group_id`) VALUES ('$userid','$data[8]')";
                                $result = $this->booleanQuery($sql);
                                if ($result == 1) {
                                    $sql = "SELECT `id` FROM `lecture` WHERE `group_id`= '5' AND status_id != '3'";
                                    $result = $this->dataQuery($sql);
                                    if (!empty($result)) {
                                        $ctr = 0;
                                        $insertingSQL = "INSERT INTO `attendance_sheet` (`user_id`, `lecture_id`) VALUES";
                                        foreach ($result as $value) {
                                            $lectureID = $value['id'];
                                            if (count($result) - 1 == $ctr) {
                                                $insertingSQL .= "('$userid', '$lectureID')";
                                            } else {
                                                $insertingSQL .= "('$userid', '$lectureID'), ";
                                                $ctr++;
                                            }
                                        }
                                        $result = $this->booleanQuery($insertingSQL);
                                        return $username . "~" . $uniquePassword;
                                    } else {
                                        return $username . "~" . $uniquePassword;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        if ($result) {
            return $username . "~" . $uniquePassword;
        } else {
            return 'failed!';
        }
    }

    public function updateStudent(array $data) {
        // $data=array($id,$name,$mobile,$DOB,$gender,$address,fatherMob, motherMob, school, groupID, realID);
        $result = $this->address->create($data[5]);
        if ($result != FALSE) {
            $user = array($data[0], $data[1], $data[3], $data[4], $result, '3', "1", $data[10]);
            $result = $this->update($user);
            if ($result == 1) {
                $telephone = array($data[0], $data[2], '1');
                $result = $this->telephone->update($telephone);
                $telephone2 = array($data[0], $data[6], '2');
                $result = $this->telephone->update($telephone2);
                $telephone3 = array($data[0], $data[7], '3');
                $result = $this->telephone->update($telephone3);
                if ($result == 1) {
                    $school = array($data[0], $data[8]);
                    $result = $this->school->update($school);
                    if ($result == 1) {
                        $sql = "UPDATE `student_group` SET `group_id`= '$data[9]' WHERE `user_id`='$data[0]'";
                        $result = $this->booleanQuery($sql);
                        return $result;
                    }
                }
            }
        }
        return FALSE;
    }

    public function DisplayStudentInfoForm($userID) {
        $sql = "SELECT * FROM user, email, telephone WHERE user.id='$userID' AND email.user_id='$userID' AND telephone.user_id='$userID'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function getAllPatientData($patientid) {
        $sql = "SELECT user.id, user.name, user.bithdate,user.ismale, email.email, telephone.telephone FROM ((user INNER JOIN email ON user.id = email.user_id) INNER JOIN telephone ON user.id = telephone.user_id) WHERE user.id = '$patientid'";
        $result = $this->dataQuery($sql);
        if (!empty($result)) {
            foreach ($result as $value) {
                $this->id = $value['id'];
                $this->name = $value['name'];
                $this->birthdate = $value['bithdate'];
                $this->ismale = $value['ismale'];
                $this->email->email = $value['email'];
                $this->telephone->telephone = $value['telephone'];
            }
        }
        return $this;
    }

    public function studentTable($limit, $offset) {
//        $sql = "SELECT user.*, user_type.type, telephone.telephone, school.school, user_login.username, user_login.password, student_group.group_id, `group`.`name` AS group_name FROM ((((((user INNER JOIN user_type ON user.type_id = user_type.id AND user.status = '1') INNER JOIN telephone ON user.id = telephone.user_id) INNER JOIN school ON user.id = school.user_id) INNER JOIN user_login ON user_login.userid = user.id) INNER JOIN student_group ON student_group.user_id = user.id) INNER JOIN `group` ON `group`.`id` = student_group.group_id)";
        $this->booleanQuery("SET CHARACTER SET utf8;");
        $sql = "SELECT user.*, user_type.type, telephone.telephone, school.school, user_login.username, user_login.password, student_group.group_id, `group`.`name` AS group_name FROM ((((((user INNER JOIN user_type ON user.type_id = user_type.id AND user.status = '1') INNER JOIN telephone ON user.id = telephone.user_id) INNER JOIN school ON user.id = school.user_id) INNER JOIN user_login ON user_login.userid = user.id) INNER JOIN student_group ON student_group.user_id = user.id) INNER JOIN `group` ON `group`.`id` = student_group.group_id) ORDER BY id LIMIT $limit OFFSET $offset";
        $result = $this->dataQuery($sql);
        $studentsData = array();
        $student = array();
        $ctr = 0;
        if (!empty($result)) {
            foreach ($result as $value) {
                if ($ctr == 0) {
                    array_push($student, $value['id']);
                    array_push($student, $value['name']);
                    array_push($student, $value['bithdate']);
                    array_push($student, $value['ismale']);
                    array_push($student, $value['address_id']);
                    array_push($student, $value['telephone']);
                    $ctr = 2;
                } else if ($ctr == 2) {
                    array_push($student, $value['telephone']);
                    //array_push($studentsData, $student);
                    array_push($student, $value['school']);
                    array_push($student, "-");
                    array_push($student, $value['real_id']);
                    array_push($student, $value['password']);
                    array_push($student, $value['group_id']);
                    array_push($student, $value['group_name']);
                    array_push($studentsData, $student);
                    unset($student);
                    $ctr = 1;
                } else {
                    $student = array();
                    array_push($student, $value['id']);
                    array_push($student, $value['name']);
                    array_push($student, $value['bithdate']);
                    array_push($student, $value['ismale']);
                    array_push($student, $value['address_id']);
                    array_push($student, $value['telephone']);
                    $ctr++;
                }
            }
        }
        return $studentsData;
    }

    function getGroupStudents($groupID) {
        $this->booleanQuery("SET CHARACTER SET utf8;");
        $sql = "SELECT * FROM `student_group` INNER JOIN user ON student_group.user_id = user.id AND student_group.group_id = '$groupID' AND user.status='1' ORDER BY user.name ASC";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function searchStudent($limit, $offset, $searchBy, $value) {
//        $searchIndex = array();

        $searchIndex = explode("-", $searchBy);
        $this->booleanQuery("SET CHARACTER SET utf8;");
        $sql = "SELECT user.*, user_type.type, telephone.telephone, school.school, user_login.username, user_login.password, student_group.group_id, `group`.`name` AS group_name FROM ((((((user INNER JOIN user_type ON user.type_id = user_type.id AND user.status = '1') INNER JOIN telephone ON user.id = telephone.user_id) INNER JOIN school ON user.id = school.user_id) INNER JOIN user_login ON user_login.userid = user.id) INNER JOIN student_group ON student_group.user_id = user.id) INNER JOIN `group` ON `group`.`id` = student_group.group_id) WHERE $searchIndex[0].$searchIndex[1] LIKE N'%$value%'";
        $result = $this->dataQuery($sql);
        $studentsData = array();
        $student = array();
        $ctr = 0;
        if (!empty($result)) {
            foreach ($result as $value) {
                if ($ctr == 0) {
                    array_push($student, $value['id']);
                    array_push($student, $value['name']);
                    array_push($student, $value['bithdate']);
                    array_push($student, $value['ismale']);
                    array_push($student, $value['address_id']);
                    array_push($student, $value['telephone']);
                    $ctr = 2;
                } else if ($ctr == 2) {
                    array_push($student, $value['telephone']);
                    //array_push($studentsData, $student);
                    array_push($student, $value['school']);
                    array_push($student, "-");
                    array_push($student, $value['real_id']);
                    array_push($student, $value['password']);
                    array_push($student, $value['group_id']);
                    array_push($student, $value['group_name']);
                    array_push($studentsData, $student);
                    unset($student);
                    $ctr = 1;
                } else {
                    $student = array();
                    array_push($student, $value['id']);
                    array_push($student, $value['name']);
                    array_push($student, $value['bithdate']);
                    array_push($student, $value['ismale']);
                    array_push($student, $value['address_id']);
                    array_push($student, $value['telephone']);
                    $ctr++;
                }
            }
        }
        return $studentsData;
    }

    public function getStudentRealID($userID) {
        $sql = "SELECT `id` FROM `user` WHERE `real_id`='$userID'";
        $result = $this->dataQuery($sql);
        return $result;
    }

//    public function updateIDs() {
//        $this->booleanQuery("SET CHARACTER SET utf8;");
//        $sql = "SELECT * FROM `user` WHERE `real_id` LIKE '%a%'";
//        $result = $this->dataQuery($sql);
//        if (!empty($result)) {
//            $ctr = 0;
//            foreach ($result as $value) {
//                $ctr++;
//                $id = $value['real_id'];
//                $newID = trim($id," ");
////                $newID = preg_replace(' ', '', $id);
//                $sql = "UPDATE `user` SET `real_id`='$newID' WHERE `real_id`='$id'";
//                $result2 = $this->booleanQuery($sql);
//            }
//            return $id ."-".$newID;
//        }
//    }

//    public function InsertTelephones() {
//
//      $sql = "INSERT INTO `telephone`(`id`, `user_id`, `telephone`, `title_id`) VALUES ('','','','')";
//        $sql = "SELECT * FROM `telephone` WHERE 1";
//        $result = $this->dataQuery($sql);
//        if (!empty($result)) {
//            foreach ($result as $value) {
//                $id = $value['user_id'];
//                $tel = $value['telephone'];
//                $sql = "INSERT INTO `telephone`(`user_id`, `telephone`, `title_id`) VALUES ('$id','$tel','1')";
//                $result = $this->booleanQuery($sql);
//            }
//            return "finisheddd";
//        }
//    }
//
}
