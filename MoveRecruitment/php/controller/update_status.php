<?php

include_once '../model/lecture.php';

$statusID = $_POST['value'];
$lectureID = $_POST['lectureID'];

$l1 = new lecture();

$data = array($statusID, $lectureID);
$result = $l1->updateStatus($data);

if($result){
    echo "success";
}else{
    echo "failed";
}
