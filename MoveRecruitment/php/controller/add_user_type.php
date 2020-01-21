<?php

require_once '../model/user_type.php';

$u1 = new user_type();

$type_name = $_POST['typename'];
$selected = $_POST['optgroup'];


if (empty($type_name)) {
    echo "Please fill all fields!";
} else if (preg_match('/[0-9]/', $type_name)) {
    echo "Type name should not contain any numeric value!";
} else {
    $data = array($type_name, $selected);
    print_r($data);
    $result = $u1->create($data);
    if ($result) {
        $result2 = $u1->create_user_access($data);
        echo $result2;
    }
}