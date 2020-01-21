<?php

//include_once '../model/user.php';
include_once '../model/student.php';
//include_once '../model/address.php';

//$u1 = new user();
$s1 = new student();
//$ad1 = new address();

$value = $_POST['value'];
$searchBy = $_POST['searchBy'];
$offset = 0;
$limit = 20;


$result = $s1->searchStudent($limit, $offset, $searchBy, $value);

function printData($result, $offset, $limit, $obj) {
    if (!empty($result)) {
        for ($i = 0; $i < count($result); $i++) {
//            $addressResult = $ad1->readFullAddress($result[$i][0]);
            if ($i == count($result) - 1) {
                echo $result[$i][0] . "~" . $result[$i][1] . "~" . $result[$i][2] . "~" . $result[$i][5] . "~" . $result[$i][6] . "~NA~" . $result[$i][3] . "~" . $result[$i][4] . "~NA~NA~NA~NA~NA~" . $result[$i][7] . "~" . $result[$i][8] . "~" . $result[$i][9] . "~" . $result[$i][10] . "~" . $result[$i][11] . "~" . $result[$i][12];
            } else {
                echo $result[$i][0] . "~" . $result[$i][1] . "~" . $result[$i][2] . "~" . $result[$i][5] . "~" . $result[$i][6] . "~NA~" . $result[$i][3] . "~" . $result[$i][4] . "~NA~NA~NA~NA~NA~" . $result[$i][7] . "~" . $result[$i][8] . "~" . $result[$i][9] . "~" . $result[$i][10] . "~" . $result[$i][11] . "~" . $result[$i][12] . "!^@";
            }
        }
    }

    if (count($result) == $limit / 2) {
        $offset = $offset + $limit;
        $result = $obj->studentTable($limit, $offset);
        echo "!^@";
        printData($result, $offset, $limit, $obj);
    }
}

printData($result, $offset, $limit, $s1);