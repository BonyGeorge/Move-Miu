
<?php

include_once '../model/room_type.php';

$room_type = new room_type();

$data = array("123", "123");
$result = $room_type->read($data);

if (!empty($result)) {
    $i = 0;
    foreach ($result as $value) {
        if ($i == count($result) - 1) {
            echo $value['id'] . "~" . $value['type_name'];
        } else {
            echo $value['id'] . "~" . $value['type_name'] . "!^@";
            $i++;
        }
    }
}
?>
