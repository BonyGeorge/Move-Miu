<?php

include_once '../model/session.php';

$s1 = new session();
$searchBy = $_POST['searchBy'];
$value = $_POST['value'];
$result = $s1->read(array($searchBy, $value));

for ($i = 0; $i < count($result); $i++) {
    if ($i == count($result) - 1)
        echo $result[$i]->id . "~" . $result[$i]->name . "~" . $result[$i]->content . "~" . $result[$i]->hw . "~";
    else
        echo $result[$i]->id . "~" . $result[$i]->name . "~" . $result[$i]->content . "~" . $result[$i]->hw . "!^@";
}