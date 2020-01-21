<?php

include_once '../model/faculty.php';

$f1 = new faculty();


$result = $f1->read(array(1,2));



for ($i = 0; $i < count($result); $i++) {
    if ($i == count($result) - 1)
        echo $result[$i]->id . "~" . $result[$i]->name . "~";
    else
        echo $result[$i]->id . "~" . $result[$i]->name . "!^@";
}