<?php

require_once '../model/duration.php';
$d1 = new duration();

$department_id = $_POST['department_id'];

$result = $d1->read(array($department_id));
if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        if ($i == count($result) - 1) {
            echo $value['id'] . "~" . $value['name'] . "~" . $value['start'] . "~" . $value['end'] . "~" . $value['counter'];
        } else {
            echo $value['id'] . "~" . $value['name'] . "~" . $value['start'] . "~" . $value['end'] . "~" . $value['counter'] . "!^@";
            $i++;
        }
    }
}
