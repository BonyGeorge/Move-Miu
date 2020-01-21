<?php

include_once '../model/exam.php';

$e1 = new exam();

$examID = $_POST['id'];
$score = $_POST['score'];


$result = $e1->update(array($examID, $score));

if ($result) {
    echo 'success';
} else
    echo 'Failed!';