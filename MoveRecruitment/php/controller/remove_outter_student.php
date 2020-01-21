<?php

include_once '../model/attendence_sheet.php';

$a1 = new attendence_sheet();

$userID = $_POST['userID'];
$sessionID = $_POST['sessionID'];
$groupID = $_POST['groupID'];
$realLectureID = $_POST['realLectureID'];


$result = $a1->removeOutterStudents($userID, $sessionID, $groupID, $realLectureID);
if ($result) {
    echo 'success';
} else {
    echo 'failed';
}