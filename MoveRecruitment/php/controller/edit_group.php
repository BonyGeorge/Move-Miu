<?php

include_once '../model/group.php';


$id = $_POST['id'];
$name = $_POST['name'];
$center = $_POST['center'];

$g1 = new group();
$data = array($id, $name, $center);
$result = $g1->update($data);
echo $result;
