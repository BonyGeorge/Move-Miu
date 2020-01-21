<?php

include_once '../model/applicant.php';
$a1 = new applicant();

$cID = $_POST['cID'];
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$faculty = $_POST['faculty'];
$department = $_POST['department'];
$duration = $_POST['duration'];

$idFound = $a1->checkUpdateID($id);

if (empty($id) || empty($name) || empty($email) || empty($mobile) || empty($faculty) || empty($department) || empty($duration)) {
    echo "Please fill all fields!";
} else if (preg_match('/[0-9]/', $name)) {
    echo "Name should not contain any numeric value!";
} else if ($idFound != $cID && $idFound != FALSE) {
    echo "ID already exists!";
} else {
    $data = array($id, $name, $email, $mobile, $gender, $faculty, $department, $duration, $cID);
    $result = $a1->update($data);
    if ($result) {
        echo 'success';
    }
}