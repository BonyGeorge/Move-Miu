<?php
require_once '../model/user_type.php';

$u1 = new user_type();
$data= array();
$result = $u1->read($data);

if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        if ($value['id'] != 6) {
            if ($i == count($result) - 2) {
                echo $value['id'] . "~" . $value['type'];
            } else {
                echo $value['id'] . "~" . $value['type'] . "~";
                $i++;
            }
        }
    }
}