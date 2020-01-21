<?php

include_once '../model/attendence_sheet.php';

$a1 = new attendence_sheet();

$sessionID = $_POST['sessionID'];
$groupID = $_POST['groupID'];
$searchBy = $_POST['searchBy'];
$value = $_POST['value'];

$searchIndex = explode("-", $searchBy);
$search = $searchIndex[0] . "." . $searchIndex[1];

$result = $a1->readOutterStudents($groupID, $sessionID, $search, $value);
//echo $result;
if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        if ($i == count($result) - 1) {
            echo $value['user_id'] . "~" . $value['real_id'] . "~" . $value['name'] . "~" . $value['studentGroup'] . "~" . $value['lectureGroup'] . "~" . $value['lecture_id'];
        } else {
            echo $value['user_id'] . "~" . $value['real_id'] . "~" . $value['name'] . "~" . $value['studentGroup'] . "~" . $value['lectureGroup'] . "~" . $value['lecture_id'] . "!^@";
            $i++;
        }
    }
}