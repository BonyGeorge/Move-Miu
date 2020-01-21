<?php

include_once '../model/administrator.php';
include_once '../model/address.php';

$a1 = new administrator();
$ad1 = new address();


$value = $_POST['value'];
$searchBy = $_POST['searchBy'];


$searchIndex = explode("-", $searchBy);
$search = $searchIndex[0] . "." . $searchIndex[1];

$result = $a1->search($search, $value);

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