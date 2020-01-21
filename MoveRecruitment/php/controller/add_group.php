<?php
include_once '../model/group.php';

$name = $_POST['name'];
$center = $_POST['center'];

if(empty($name) || empty($center)){
    echo 'Please, fill all fields!';
}else{
    $g1 = new group();
    $data = array($name, $center);
    $result = $g1->create($data);
    echo $result;
}
