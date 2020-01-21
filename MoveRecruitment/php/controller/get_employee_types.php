<?php

include_once '../model/user_type.php';

$ut = new user_type();

$data = array("123", "123");
$result = $ut->read($data);

if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        if ($i == count($result) - 1) {
            echo $value['id'] . "~" . $value['type'];
        } else {
            echo $value['id'] . "~" . $value['type'] . "~";
            $i++;
        }
    }
}