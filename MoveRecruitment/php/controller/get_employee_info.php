<?php

//include_once '../model/user.php';
include_once '../model/administrator.php';
include_once '../model/address.php';

//$u1 = new user();
$a1 = new administrator();
$ad1 = new address();


$result = $a1->DisplayEmployeeTable();

if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        $addressResult = $ad1->readFullAddress($value['id']);
        if ($i == count($result) - 1) {
            echo $value['id'] . "~" . $value['name'] . "~" . $value['type'] . "~" . $value['email'] . "~" . $value['telephone'] . "~" . $value['value'] . "~" . $value['bithdate'] . "~" . $addressResult->buildingNumber . "~" . $addressResult->street . "~" . $addressResult->city . "~" . $addressResult->state . "~" . $addressResult->country . "~" . $value['ismale'] . "~" . $value['real_id'];
        } else {
            echo $value['id'] . "~" . $value['name'] . "~" . $value['type'] . "~" . $value['email'] . "~" . $value['telephone'] . "~" . $value['value'] . "~" . $value['bithdate'] . "~" . $addressResult->buildingNumber . "~" . $addressResult->street . "~" . $addressResult->city . "~" . $addressResult->state . "~" . $addressResult->country . "~" . $value['ismale'] . "~" . $value['real_id'] . "!^@";
            $i++;
        }
    }
}