<?php

include_once '../model/department.php';

$d1 = new department();


$result = $d1->read(array(1, 2));



for ($i = 0; $i < count($result); $i++) {
    if ($i == count($result) - 1)
        echo $result[$i]->id . "~" . $result[$i]->name . "~";
    else
        echo $result[$i]->id . "~" . $result[$i]->name . "!^@";
}