<?php

include_once '../model/attendence_sheet.php';

$a1 = new attendence_sheet();

$userID = $_POST['userID'];
$realLectureID = $_POST['realLectureID'];
$newLectureID = $_POST['newLectureID'];


$result = $a1->addOutterStudents($userID, $realLectureID, $newLectureID);
if ($result) {
    echo 'success';
} else {
    echo 'failed';
}