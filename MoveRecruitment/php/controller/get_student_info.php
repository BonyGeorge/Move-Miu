<?php

include_once '../model/student.php';
$s1 = new student();

$offset = $_POST['offset'];
$limit = $_POST['limit'];

//echo $s1->updateIDs();

$result = $s1->studentTable($limit, $offset);



if (!empty($result)) {
    for ($i = 0; $i < count($result); $i++) {
        if ($i == count($result) - 1) {
            echo $result[$i][0] . "~" . $result[$i][1] . "~" . $result[$i][2] . "~" . $result[$i][5] . "~" . $result[$i][6] . "~NA~" . $result[$i][3] . "~" . $result[$i][4] . "~NA~NA~NA~NA~NA~" . $result[$i][7] . "~" . $result[$i][8] . "~" . $result[$i][9] . "~" . $result[$i][10] . "~" . $result[$i][11] . "~" . $result[$i][12];
        } else {
            echo $result[$i][0] . "~" . $result[$i][1] . "~" . $result[$i][2] . "~" . $result[$i][5] . "~" . $result[$i][6] . "~NA~" . $result[$i][3] . "~" . $result[$i][4] . "~NA~NA~NA~NA~NA~" . $result[$i][7] . "~" . $result[$i][8] . "~" . $result[$i][9] . "~" . $result[$i][10] . "~" . $result[$i][11] . "~" . $result[$i][12] . "!^@";
        }
    }
}

