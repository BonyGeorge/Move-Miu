<?php

//require_once '../model/user.php';
require_once '../model/administrator.php';

//$u1 = new user();
$a1 = new administrator();

$type = $_POST['account'];
$name = $_POST['name'];
$mail = "unkown";
$mobile = $_POST['mobile'];
$cityID = 48321;
$cityName = "Unkown";
$buildingNumber = 1;
$streetName = "Unkown";
$stateID = 1048;
$address = array($cityID, $streetName, $buildingNumber, $cityName, $stateID);
$DOB = "2010-01-01";
$gender = $_POST['gender'];
$salary = 0;
$workDurations = $_POST['workDurations'];
$userID = $_POST['userID'];


if (empty($type) || empty($name) || empty($mobile) || empty($cityID) || empty($DOB)) {
    echo "Please fill all fields!";
}else if (preg_match('/[0-9]/', $name)) {
    echo "Name should not contain any numeric value!";
} else {
    $data = array($type, $name, $mail, $address, $mobile, $DOB, $gender, $salary, $userID, $workDurations);
    $result = $a1->updateEmployee($data);
    echo $result;
}