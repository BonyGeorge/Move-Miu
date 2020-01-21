<?php
include_once '../model/address.php';

$userID = $_POST['userID'];
$data = array($userID);

$a1 = new address();
$addressArr = $a1->read($data);

for ($i = 0; $i < count($addressArr); $i++) {
    if ($i == count($addressArr) - 1) {
        echo $addressArr[$i];
        break;
    } else {
        echo $addressArr[$i] . '~';
    }
}
