<?php

include_once '../model/lecture.php';

$id = $_POST['id'];

$l1 = new lecture();
$data = array($id);
$result = $l1->delete($data);
if ($result) {
    echo 'success';
} else {
    echo 'failed';
}