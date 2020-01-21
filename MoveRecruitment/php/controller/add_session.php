<?php
include_once '../model/session.php';

$name = $_POST['name'];
$content = $_POST['content'];
$homework = $_POST['homework'];

$s1 = new session();
$data = array($name, $content, $homework);
$result = $s1->create($data);
echo $result;