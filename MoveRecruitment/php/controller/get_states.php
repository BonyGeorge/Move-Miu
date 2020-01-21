<?php

require_once'../model/address.php';

$a1 = new address();

$countryID = $_POST['countryID'];

$result = $a1->readstates($countryID);

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
?>