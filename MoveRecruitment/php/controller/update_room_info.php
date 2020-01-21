<?php

require_once "../model/room.php";
include_once '../model/room_type.php';

$roomID = $_POST['roomID'];
$roomName = $_POST['roomName'];
$roomType = $_POST['roomType'];
$newRoomType = $_POST['newRoomType'];

if (!empty($roomName) && !empty($roomType)) {
    $room = new room();
    if ($newRoomType == "false") {
        $data = array($roomName, $roomType, $roomID);
        $result = $room->update($data);
        echo $result;
    } else {
        $room_type = new room_type();
        $data = array($roomType);
        $result = $room_type->create($data);
        if ($result != 0) {
            $data = array($roomName, $result, $roomID);
            $result = $room->update($data);
        }
        echo $result;
    }
} else {
    echo "Please, fill all fields!";
}



