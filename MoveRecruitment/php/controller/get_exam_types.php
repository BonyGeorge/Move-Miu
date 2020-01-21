<?php

include_once '../model/exam_type.php';
$exam_type = new exam_type();
$data = array("123", "123");
$result = $exam_type->read($data);
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