<?php
require_once '../model/user_type.php';

$u1 = new user_type();

$result = $u1->read_user_types();

echo $result;
