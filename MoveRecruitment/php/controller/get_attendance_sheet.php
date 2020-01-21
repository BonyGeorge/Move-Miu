<?php

include_once '../model/attendence_sheet.php';

$a1 = new attendence_sheet();

$lectureID = $_POST['lectureID'];
$searchBy = $_POST['searchBy'];
$value = $_POST['value'];

$searchIndex = explode("-", $searchBy);
$search = $searchIndex[0] . "." . $searchIndex[1];

$result = $a1->read(array($lectureID, $search, $value));

if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        if ($i == count($result) - 1) {
            echo $value['user_id'] . "~" . $value['real_id'] . "~" . $value['name'] . "~" . $value['attend'];
        } else {
            echo $value['user_id'] . "~" . $value['real_id'] . "~" . $value['name'] . "~" . $value['attend'] . "!^@";
            $i++;
        }
    }
}