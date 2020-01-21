<?php

include_once '../model/duration.php';

$d1 = new duration();
$userID = $_POST['userID'];
$durationArr = $d1->readUserDurations($userID);

for ($i = 0; $i < count($durationArr); $i+=4) {
    if ($i == count($durationArr)-4) {
        echo $durationArr[$i] . '~' . $durationArr[$i+1] . '~' . $durationArr[$i+2] . '~' . $durationArr[$i+3];
        break;
    } else {
        echo $durationArr[$i] . '~' . $durationArr[$i+1] . '~' . $durationArr[$i+2] . '~' . $durationArr[$i+3] . '@^';
    }
}