<?php

include_once '../model/date.php';
$dateObj = new date();
$date = $_POST['date'];
$time = $_POST['time'];
$arr = array($date, $time);

if ($dateObj->create($arr)) {
    echo true;
}