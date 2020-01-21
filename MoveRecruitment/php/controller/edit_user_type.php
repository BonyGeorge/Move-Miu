<?php
require_once '../model/user_type.php';

$u1 = new user_type();

$type_id = $_POST['typeid'];
$type_name = $_POST['typename'];
$selected = $_POST['optgroup'];
foreach ($selected as $value) {
    echo value[0];   
}

$data = array($type_id, $type_name, $selected);

$u1->delete_user_access($data);
$u1->update_user_access($data);

if(!empty($type_name)){
$result = $u1->update($data);
}




