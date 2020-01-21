<?php
require_once '../model/account_settings.php';

$a1 = new account_settings();

$userID = $_POST['userID'];
$data = array($userID);
$userInfo = $a1->read($data);
if (!empty($userInfo)) {
    foreach ($userInfo as $value) {
        echo $value['name'] . "~" . $value['email'] . "~" . $value['telephone'] . "~" . $value['bithdate'] . "~" . $value['ismale'];
    }
}