<?php
require_once '../model/student.php';

$s1 = new student();

$userID = $_POST['userID'];
$result=$s1->DisplayStudentInfoForm($userID);

if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        echo   $value['name'] . "~" . $value['email'] . "~" . $value['telephone'] . "~" . $value['bithdate'] . "~" . $value['ismale'] . "~" . $value['user_id']. "~" .$value['address_id'];
    }
}