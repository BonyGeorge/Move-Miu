<?php

include_once '../model/exam.php';

$e1 = new exam();

$examID = $_POST['id'];


$result = $e1->delete(array($examID));

if ($result) {
    echo 'success';
} else
    echo 'Failed!';