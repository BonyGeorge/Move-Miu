<?php

include_once '../model/duration.php';

$dep = $_POST['dep'];
$day = $_POST['day'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$counter = $_POST['counter'];

if (empty($dep) || empty($day) || empty($start_time) || empty($end_time) || empty($counter)) {
    echo 'Please, fill all fields!';
} else {
    $d1 = new duration();
    $data = array($dep, $day, $start_time, $end_time, $counter);
    $result = $d1->create($data);
    if ($result) {
        echo 'success';
    } else {
        echo $result;
    }
}
