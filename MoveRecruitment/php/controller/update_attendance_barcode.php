<?php

include_once '../model/attendence_sheet.php';
include_once '../model/student.php';

$a1 = new attendence_sheet();
$s1 = new student();

$lectureID = $_POST['lectureID'];
$userRealID = $_POST['userID'];
$value = $_POST['value'];


$userIDresult = $s1->getStudentRealID($userRealID);
if (!empty($userIDresult)) {
    $userID = "";
    foreach ($userIDresult as $valuee) {
        $userID = $valuee['id'];
    }
    $result = $a1->update(array($lectureID, $userID, $value));
    if ($result) {
        echo $userID;
    } else {
        echo 'Something went wrong!';
    }
} else {
    echo "Student Not Found!";
}







