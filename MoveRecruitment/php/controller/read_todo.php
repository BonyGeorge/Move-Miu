<?php

include_once '../model/todo.php';

$t1 = new todo();
$userID = $_POST['userID'];
$data = array($userID);
$result = $t1->read($data);

if (!empty($result)) {
    foreach ($result as $value) {
        $checked = "";
        $text = $value['title'];
        $id=$value['id'];
        
        if ($value['status'] == 0) {
            $checked = "checked";
        }
        echo "<li class='do $checked' id='$id'>$text</li>";
    }
}