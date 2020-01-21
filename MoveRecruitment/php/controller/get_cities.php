<?php

require_once'../model/address.php';

$a1 = new address();

$stateID = $_POST['stateID'];

$result = $a1->readCities($stateID);

if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        if ($i == count($result) - 1) {
            echo $value['id'] . "~" . $value['name'];
        } else {
            echo $value['id'] . "~" . $value['name'] . "~";
            $i++;
        }
    }
}