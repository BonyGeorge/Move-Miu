<?php

include_once 'user.php';
include_once 'user_login.php';
include_once 'email.php';
include_once 'salary.php';
include_once 'telephone.php';
include_once 'profile_photo.php';
include_once 'duration.php';
include_once 'address.php';

class administrator extends user {

    private $userLogin;
    private $salary;
    private $email;
    private $telephone;
    private $profilePhoto;
    private $duration;
    private $address;

    function __construct() {
        $this->userLogin = new user_login();
        $this->salary = new salary();
        $this->email = new email();
        $this->telephone = new telephone();
        $this->profilePhoto = new profile_photo();
        $this->duration = new duration();
        $this->address = new address();
    }

    public function addEmployee(array $data) {
//$data = array($type, $name, $mail, $address,$mobile, $DOB, $gender, $salary,$password, $url, $workDurations,realID);
        $result = $this->address->create($data[3]);
        if ($result != FALSE) {
            $user = array($data[1], $data[5], $data[6], $result, $data[0], "1", $data[11]);
            $result = $this->create($user);
            if ($result == 1) {
                $sql = "SELECT max(`id`), `name` FROM `user` WHERE `id`= (SELECT max(`id`) FROM `user` WHERE 1)";
                $result = $this->dataQuery($sql);
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $username = $value['name'] . $value['max(`id`)'];
                        $userid = $value['max(`id`)'];
                    }
                    $userLoginData = array($username, $data[8], $userid);
                    $result = $this->userLogin->create($userLoginData);
                    if ($result == 1) {
                        $email = array($userid, $data[2]);
                        $result = $this->email->create($email);
                        if ($result == 1) {
                            $telephone = array($userid, $data[4]);
                            $result = $this->telephone->create($telephone);
                            if ($result == 1) {
                                $img = array($userid, $data[9]);
                                $result = $this->profilePhoto->create($img);
                                if ($result == 1) {
                                    $salary = array($data[7], $userid, 0);
                                    $result = $this->salary->create($salary);
                                }
                                if ($result == 1) {
                                    $durations = array($data[10], $userid);
                                    $result = $this->duration->create($durations);
                                    if ($result == 1) {
                                        return $username;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return FALSE;
    }

    public function updateEmployee(array $data) {
        //$data = array($type, $name, $mail, $address, $mobile, $DOB, $gender, $salary, $userID, $workDurations);
        $result = $this->address->create($data[3]);
        if ($result != FALSE) {
            $user = array($data[8], $data[1], $data[5], $data[6], $result, $data[0], "1");
            $result = $this->update($user);
            if ($result == 1) {
                $email = array($data[8], $data[2]);
                $result = $this->email->update($email);
                if ($result == 1) {
                    $telephone = array($data[8], $data[4],1);
                    $result = $this->telephone->update($telephone);
                    if ($result == 1 && $data[0] != 1 && $data[0] != 6 && $data[0] != 3) {
                        $salary = array($data[7], $data[8], 0);
                        $result = $this->salary->update($salary);
                    }
                    if ($result == 1 && $data[0] != 3) {
                        $durations = array($data[9], $data[8]);
                        $result = $this->duration->update($durations);
                    }
                }
            }
        }
        return $result;
    }

    public function deleteEmployee(array $data) {
        $result = $this->delete($data);
        return $result;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function search($searchBy, $value) {
        $value = $this->test_input($value);
        $searchBy = $this->test_input($searchBy);
        $sql="SELECT user.*, email.email, user_type.type, telephone.telephone, salary.value FROM ((((user INNER JOIN email ON user.id = email.user_id AND user.status='1' AND user.type_id != '3') INNER JOIN user_type ON user.type_id = user_type.id) INNER JOIN telephone ON user.id = telephone.user_id) INNER JOIN salary on user.id = salary.userid) WHERE $searchBy LIKE '%$value%' ";
//        $sql = "SELECT user.*, email.email, user_type.type, telephone.telephone, salary.value FROM ((((user INNER JOIN email ON user.id = email.user_id AND user.$searchBy LIKE '%$value%' AND user.status='1' AND user.type_id != '3') INNER JOIN user_type ON user.type_id = user_type.id) INNER JOIN telephone ON user.id = telephone.user_id) INNER JOIN salary on user.id = salary.userid)";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function DisplayEmployeeTable() {
        $sql = "SELECT user.*, email.email, user_type.type, telephone.telephone, salary.value FROM ((((user INNER JOIN email ON user.id = email.user_id AND user.status='1' AND user.type_id != '3') INNER JOIN user_type ON user.type_id = user_type.id) INNER JOIN telephone ON user.id = telephone.user_id) INNER JOIN salary on user.id = salary.userid)";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function DisplayEmployeeInfoForm($userID) {
        $sql = "SELECT * FROM `user`, `email`, `telephone`, `salary`, `profile_photo` WHERE user.id='$userID' AND user.status='1' AND email.user_id='$userID' AND telephone.user_id='$userID' AND salary.userid='$userID' AND profile_photo.user_id='$userID'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function getEmployees() {
        $sql = "SELECT user.id, user.name,user_type.type FROM `user` INNER JOIN user_type ON user.type_id = user_type.id AND user_type.id != '1' AND user.status = '1'  ORDER BY user_type.type ASC";
        $result = $this->dataQuery($sql);
        $employees = array();
        $employeeTypeStored = "";
        if (!empty($result)) {
            foreach ($result as $value) {
                $employeeData = array();
                $employeeType = $value['type'];
                $employeeID = $value['id'];
                $employeeName = $value['name'];
                if ($employeeType != $employeeTypeStored) {
                    array_push($employeeData, $employeeType);
                    $employeeTypeStored = $employeeType;
                }
                array_push($employeeData, $employeeID);
                array_push($employeeData, $employeeName);
                array_push($employees, $employeeData);
            }
        }
        return $employees;
    }

}