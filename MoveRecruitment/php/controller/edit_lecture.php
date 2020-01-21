<?php

include_once '../model/lecture.php';

$session = $_POST['session'];
$date = $_POST['date'];
$start_time = $_POST['startTime'];
$end_time = $_POST['endTime'];
$max_students = $_POST['maxStudents'];
$lectureID = $_POST['id'];


//echo $group;
if (empty($lectureID) || empty($session) || empty($date) || empty($start_time) || empty($end_time) || empty($max_students)) {
    echo 'Please, fill all fields!';
} else {
    $l1 = new lecture();
    $data = array($lectureID, $session, $date, $start_time, $end_time, $max_students);
    $result = $l1->update($data);
    if ($result) {
        echo 'success';
    } else {
        echo 'Something Went Wrong!';
    }
}