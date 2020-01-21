<?php
require_once '../model/user_type.php';

$u1 = new user_type();

$data = array();

$result = $u1->get_types_info($data);
$i = 0;
if (!empty($result)) {
    foreach ($result as $value) {
        if ($i == count($result) - 1) {
            echo $value['id'] . "~" . $value['name'] . "~" . $value['type'];
        } else {
            echo $value['id'] . "~" . $value['name'] . "~" . $value['type'] . "!^@";
            $i++;
        }
    }
}