<?php

require_once '../model/account_settings.php';

$a1 = new account_settings();

$userid = $_POST['userid'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$DOB = $_POST['DOB'];
$gender = $_POST['gender'];


if (empty($DOB) || empty($name) || empty($email) || empty($mobile)) {
    echo "Please, fill all fields!";
} else if (preg_match('/[0-9]/', $name)) {
    echo "Name should not contain any numeric value!";
} else {
    $data = array($userid, $name, $email, $mobile, $DOB, $gender);
    $result = $a1->update($data);
    echo $result;
}

