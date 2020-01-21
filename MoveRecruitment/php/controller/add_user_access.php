<?php
require_once '../model/user_type.php';

$u1 = new user_type();

$type_name=$_POST['typename'];
$selected=$_POST['optgroup'];

$data = array($type_name,$selected);
$result = $u1->create_user_access($data);

echo $result;