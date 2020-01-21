<?php
include_once '../model/room.php';
$room = new room();
$data = array("123", "123");
$result = $room->read($data);
if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        if ($i == count($result) - 1) {
            echo $value['name'] . "~" . $value['type_name'] . "~" . $value['id'];
        } else {
            echo $value['name'] . "~" . $value['type_name'] . "~" . $value['id'] . "!^@";
            $i++;
        }
    }
}