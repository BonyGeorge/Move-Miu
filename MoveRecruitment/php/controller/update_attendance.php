<?php

include_once '../model/attendence_sheet.php';

$a1 = new attendence_sheet();

$lectureID = $_POST['lectureID'];
$userID = $_POST['userID'];
$value = $_POST['value'];

$result = $a1->update(array($lectureID, $userID, $value));

if ($result) {
    echo 'success';
} else {
    echo 'failed';
}