<?php

//include_once '../model/user.php';
include_once '../model/student.php';

//$u1 = new user();
$s1 = new student();
$groupID = $_POST['groupID'];

$result = $s1->getGroupStudents($groupID);

if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        if ($i == count($result) - 1) {
            echo $value['real_id'] . "~" . $value['name'];
        } else {
            echo $value['real_id'] . "~" . $value['name'] . "!^@";
            $i++;
        }
    }
}