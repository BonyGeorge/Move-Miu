<?php
//require_once '../model/user.php';
require_once '../model/administrator.php';

//$u1 = new user();
$a1 = new administrator();

$userID = $_POST['userID'];
$userData = $a1->DisplayEmployeeInfoForm($userID);
if (!empty($userData)) {
    $i = 0;
    foreach ($userData as $value) {
        echo $value['type_id'] . "~" . $value['name'] . "~" . $value['email'] . "~" . $value['telephone'] . "~" . $value['bithdate'] . "~" . $value['ismale'] . "~" . $value['value'] . "~" . $value['user_id'] . "~" . $value['url'];
    }
}