<?php

include_once '../model/applicant.php';
$a1 = new applicant();

$offset = $_POST['offset'];
$limit = $_POST['limit'];
$searchBy = $_POST['searchBy'];
$value = $_POST['value'];

$searchIndex = explode("-", $searchBy);
$search = $searchIndex[0] . "." . $searchIndex[1];


$result = $a1->read(array($limit, $offset, $search, $value));



if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        //id - uni_id - name - email - mobile - is_male - faculty - department - day - start - end - status
        if ($i == count($result) - 1) {
            echo $value['id'] . "~" . $value['uni_id'] . "~" . $value['name'] . "~" . $value['email'] . "~" . $value['mobile'] . "~" . $value['is_male'] . "~" . $value['faculty'] . "~" . $value['department'] . "~" . $value['day'] . "~" . $value['start'] . "~" . $value['end'] . "~" . $value['status'] . "~" . $value['faculty_id'] . "~" . $value['department_id'] . "~" . $value['duration_id'];
        } else {
            echo $value['id'] . "~" . $value['uni_id'] . "~" . $value['name'] . "~" . $value['email'] . "~" . $value['mobile'] . "~" . $value['is_male'] . "~" . $value['faculty'] . "~" . $value['department'] . "~" . $value['day'] . "~" . $value['start'] . "~" . $value['end'] . "~" . $value['status'] . "~" . $value['faculty_id'] . "~" . $value['department_id'] . "~" . $value['duration_id'] . "!^@";
            $i++;
        }
    }
}