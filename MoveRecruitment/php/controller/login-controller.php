<?php
include_once '../model/login.php';
session_start();

if (isset($_POST['btn-login'])) {
    $l1 = new login();
    
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];
    $data = array($username,$password);
    $result = $l1->read($data);
    if(!empty($result)){
        foreach ($result as $value) {
            $userID=$value['userid'];
        }
         $_SESSION['user-id'] = $userID;
         header("location:../viewer/profile.php");
    }else{
        // select error message
        header("location:../viewer/login.php");
    }

}