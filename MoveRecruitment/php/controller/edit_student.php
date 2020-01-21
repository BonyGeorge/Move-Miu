<?php

include_once '../model/student.php';

//$u1 = new user();
$s1 = new student();

$id = $_POST['patientID'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$mobileFather = $_POST['father-mobile'];
$MotherMobile = "01010101010";
$DOB = "2010-01-01";
$school = $_POST['school'];
$gender = $_POST['gender'];
$cityID = 48321;
$cityName = "Unkown";
$buildingNumber = 1;
$streetName = "Unkown";
$stateID = 1048;
$groupID = $_POST['group'];
$realID = $_POST['id'];


if (empty($name) || empty($mobile) || empty($school) || empty($mobileFather) || empty($realID) || empty($groupID)) {
    echo "Please fill all fields!";
} else if (preg_match('/[0-9]/', $name)) {
    echo "Name should not contain any numeric value!";
} else {
    $address = array($cityID, $streetName, $buildingNumber, $cityName, $stateID);
    $data = array($id, $name, $mobile, $DOB, $gender, $address, $mobileFather, $MotherMobile, $school, $groupID, $realID);
    $result = $s1->updateStudent($data);
    echo $result;
}