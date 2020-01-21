<?php
require_once '../model/room.php';

$r1 = new room();

$roomID = $_POST['roomID'];
$roomInfo = $r1->readRoomInfo($roomID);
if (!empty($roomInfo)) {
    foreach ($roomInfo as $value) {
        echo $value['name'] . "~" . $value['type_id'];
    }
}