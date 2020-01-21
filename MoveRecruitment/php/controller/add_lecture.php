<?php

include_once '../model/lecture.php';

$group = $_POST['group'];
$session = $_POST['session'];
$date = $_POST['date'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$max_students = $_POST['max_students'];


//echo $group;
if (empty($group) || empty($session) || empty($date) || empty($start_time) || empty($end_time) || empty($max_students)) {
    echo 'Please, fill all fields!';
} else {
    $l1 = new lecture();
    $data = array($group, $session, $date, $start_time, $end_time, $max_students);
    $result = $l1->create($data);
    echo $result;
}