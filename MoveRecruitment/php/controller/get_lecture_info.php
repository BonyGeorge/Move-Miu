<?php

//include_once '../model/user.php';
include_once '../model/lecture.php';

//$u1 = new user();
$l1 = new lecture();


$searchBy = $_POST['searchBy'];
$value = $_POST['value'];

$searchIndex = explode("-", $searchBy);
$search = $searchIndex[0] . "." . $searchIndex[1];

$data = array($search, $value);
$result = $l1->read($data);
if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        if ($i == count($result) - 1) {
            echo $value['id'] . "~" . $value['group'] . "~" . $value['session'] . "~" . $value['date'] . "~" . $value['start_time'] . "~" . $value['end_time'] . "~" . $value['status'] . "~" . $value['max_num_of_students'] . "~" . $value['content'] . "~" . $value['homework'] . "~" . $value['groupID'] . "~" . $value['sessionID'];
        } else {
            echo $value['id'] . "~" . $value['group'] . "~" . $value['session'] . "~" . $value['date'] . "~" . $value['start_time'] . "~" . $value['end_time'] . "~" . $value['status'] . "~" . $value['max_num_of_students'] . "~" . $value['content'] . "~" . $value['homework'] . "~" . $value['groupID'] . "~" . $value['sessionID'] . "!^@";
            $i++;
        }
    }
}