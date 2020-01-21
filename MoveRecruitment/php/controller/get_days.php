<?php

include_once '../model/day.php';

$d1 = new day();

$data = array("123", "123");
$result = $d1->read($data);

if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        if ($i == count($result) - 1) {
            echo $value['id'] . "~" . $value['name'];
        } else {
            echo $value['id'] . "~" . $value['name'] . "!^@";
            $i++;
        } 
    }
}