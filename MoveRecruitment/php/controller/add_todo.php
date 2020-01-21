<?php

include_once '../model/todo.php';

$userID = $_POST['userID'];
$text = $_POST['text'];

if (empty($text)) {
    echo "Please, fill out the input to submit in your list!";
} else {
    $t1 = new todo();
    $data = array($userID, $text);
    $result = $t1->create($data);
    echo $result;
}