<?php

require_once '../model/account_settings.php';

$a1 = new account_settings();

$userid = $_POST['userid'];
$password = $_POST['password'];
$newpassword = $_POST['newpassword'];
$reenternew = $_POST['reenternew'];

if ($password == $newpassword) {
    echo "Old password and new one are just the same!";
} else if ($newpassword != $reenternew) {
    echo "Wrong re-entering password!";
} else if ($newpassword == $reenternew) {
    $data = array($userid, $newpassword);
    $result = $a1->read_security_info($data);
    if (!empty($result)) {
        foreach ($result as $value) {
            $truePassword = $value['password'];
        }
    }
    if ($password == $truePassword) {
        $result = $a1->update_security_info($data);
        echo $result;
    }else{
        echo "Wrong Password Entered!";
    }
    
}