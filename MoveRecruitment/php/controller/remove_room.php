<?php

include_once '../model/room.php';

$room= new room();
$room_type_id= $_POST['room_type_id'];
$data = array($room_type_id);
$result = $room->delete($data);
echo $result;