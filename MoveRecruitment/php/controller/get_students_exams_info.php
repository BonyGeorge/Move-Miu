<?php

include_once '../model/exam.php';

$e1 = new exam();

$lectureID = $_POST['lectureID'];
$searchBy = $_POST['searchBy'];
$value = $_POST['value'];

$searchIndex = explode("-", $searchBy);
$search = $searchIndex[0] . "." . $searchIndex[1];

$result = $e1->read(array($lectureID, $search, $value));
if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        if ($i == count($result) - 1) {
            //id, realID, name, typeID, type, score, max_score, examID,min_score
            echo $value['id'] . "~" . $value['real_id'] . "~" . $value['name'] . "~" . $value['type_id'] . "~" . $value['type'] . "~" . $value['score'] . "~" . $value['max_score'] . "~" . $value['examID'] . "~" . $value['min_score'];
        } else {
            echo $value['id'] . "~" . $value['real_id'] . "~" . $value['name'] . "~" . $value['type_id'] . "~" . $value['type'] . "~" . $value['score'] . "~" . $value['max_score'] . "~" . $value['examID'] . "~" . $value['min_score'] . "!^@";
            $i++;
        }
    }
}