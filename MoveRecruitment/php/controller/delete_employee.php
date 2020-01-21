<?php
//include_once '../model/user.php';
include_once '../model/administrator.php';

//$u1 = new user();
$a1 = new administrator();
$userID = $_POST['userID'];
$data = array($userID);
$result = $a1->deleteEmployee($data);
echo $result;