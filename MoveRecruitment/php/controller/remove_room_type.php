<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../model/room_type.php';

$room_type = new room_type();
$room_type_id= $_POST['room_type_id'];
$data = array($room_type_id);
$result = $room_type->delete($data);
echo $result;