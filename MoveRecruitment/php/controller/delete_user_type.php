<?php
require_once '../model/user_type.php';

$u1 = new user_type();

$type_id = $_POST["typeid"];

$data = array($type_id);

$result1 = $u1->delete($data);
$result2 = $u1->delete_user_access($data);
