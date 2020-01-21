<?php

include_once '../model/group.php';

$id = $_POST['id'];

$g1 = new group();
$data = array($id);
$result = $g1->delete($data);
echo $result;
