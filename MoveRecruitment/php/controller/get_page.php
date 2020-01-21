<?php

require_once '../model/html.php';
$h1 = new html();

$pageClassName = $_POST['page'];
$result = $h1->read_page($pageClassName);
if (!empty($result)) {
    foreach ($result as $value) {
        echo $value['html'];
    }
}