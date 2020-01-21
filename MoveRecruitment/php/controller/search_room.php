<?php
include_once '../model/room.php';
$room = new room();

$searchBy = $_POST['search'];
$value = $_POST['value'];
$result = $room->search($searchBy,$value);
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