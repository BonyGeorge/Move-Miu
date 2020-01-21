<?php

include_once '../model/todo.php';

$t1 = new todo();
$id = $_POST['id'];
$status = $_POST['status'];
$data = array($id,$status);
$result = $t1->update($data);

echo $result;