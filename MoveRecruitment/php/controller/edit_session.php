<?php

include_once '../model/session.php';
$id = $_POST['id'];
$name = $_POST['name'];
$content = $_POST['content'];
$homework = $_POST['homework'];

$s1 = new session();
$data = array($id, $name, $content, $homework);
$result = $s1->update($data);
echo $result;
