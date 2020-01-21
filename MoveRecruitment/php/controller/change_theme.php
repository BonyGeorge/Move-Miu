<?php
include_once '../model/theme.php';

$t1 = new theme();

$userID = $_POST['userID'];
$themeID = $_POST['themeID'];

$data = array($userID, $themeID);
$result = $t1->read($data);

if (!empty($result)) {
    foreach ($result as $value) {
        echo $value['link'];
    }
}