<?php

include_once '../model/todo.php';

$t1 = new todo();
$id = $_POST['id'];
$data = array($id);
$result = $t1->delete($data);

echo $result;