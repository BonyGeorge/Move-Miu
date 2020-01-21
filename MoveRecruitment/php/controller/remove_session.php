<?php

include_once '../model/session.php';

$id = $_POST['id'];

$s1 = new session();
$data = array($id);
$result = $s1->delete($data);
echo $result;
