<?php

require_once '../model/user_type.php';

$u1 = new user_type();
$user_type_id = $_POST['user_type_id'];

$data = array($user_type_id);

$result = $u1->read_user_specific_access($data);

$i = 0;
if (!empty($result)) {
    foreach ($result as $value) {
        if ($i == count($result) - 1) {
            echo $value['id'] . "~" . $value['name'];
        } else {
            echo $value['id'] . "~" . $value['name'] . "~";
            $i++;
        }
    }
}