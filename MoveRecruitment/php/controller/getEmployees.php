<?php

include_once '../model/administrator.php';

$a1 = new administrator();

$result = $a1->getEmployees();

//print_r($result);
$firstRound = true;

foreach ($result as $value) {
    if ($firstRound == false) {
        echo "!^@";
    }
    for ($j = 0; $j < count($value); $j++) {
        if ($j == count($value) - 1) {
            echo $value[$j];
        } else {
            echo $value[$j] . "~";
        }
    }
    $firstRound = false;
}