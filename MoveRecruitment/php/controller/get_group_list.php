<?php

include_once '../model/group.php';
include_once '../model/student.php';

$g1 = new group();
$s1 = new student();


//echo $s1->updateIDs();
$searchBy = $_POST['searchBy'];
$value = $_POST['value'];
$result = $g1->read(array($searchBy, $value));



for ($i = 0; $i < count($result); $i++) {
    if ($i == count($result) - 1)
        echo $result[$i]->id . "~" . $result[$i]->name . "~" . $result[$i]->center . "~";
    else
        echo $result[$i]->id . "~" . $result[$i]->name . "~" . $result[$i]->center . "!^@";
}

