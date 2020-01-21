<?php
include_once '../model/theme.php';

$t1 = new theme();
$result = $t1->getAllTheme();

if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        if ($i == count($result) - 1) {
            echo $value['id'] . "~" . $value['name'];
        } else {
            echo $value['id'] . "~" . $value['name'] . "~";
            $i++;
        }
    }
}