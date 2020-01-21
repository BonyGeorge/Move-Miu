<?php

include_once '../model/student.php';
$s1 = new student();

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$DOB = "2010-01-01";
$gender = $_POST['gender'];
$cityID = 48321;
$cityName = "Unkown";
$buildingNumber = 1;
$streetName = "Unkown";
$stateID = 1048;
$fatherMobile = $_POST['fathermobile'];
$MotherMobile = "01010101010";
$school = $_POST['school'];
$id = $_POST['id'];
$group = $_POST['group'];

if (empty($name) || empty($mobile) || empty($cityID) || empty($buildingNumber) || empty($streetName) || empty($stateID) || empty($DOB) || empty($fatherMobile) || empty($MotherMobile) || empty($school) || empty($id)) {
    echo "Please fill all fields!";
} else if (preg_match('/[0-9]/', $name)) {
    echo "Name should not contain any numeric value!";
} else if (!is_numeric($cityID) && empty($cityName)) {
    echo "Please, fill out city name in address section!";
} else {
    $address = array($cityID, $streetName, $buildingNumber, $cityName, $stateID);
    $telephones = array('1', $mobile, '2', $fatherMobile, '3', $MotherMobile);
    $data = array($name, $telephones, $address, $DOB, $gender, $school, $id, "", $group);
    $result = $s1->newStudent($data);
    echo $result;
}