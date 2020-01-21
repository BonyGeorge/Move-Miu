<?php

include_once '../model/applicant.php';

$a1 = new applicant();
$userID = $_POST['userID'];
$data = array($userID);
$result = $a1->delete($data);
echo $result;