<?php
include('classes.php');

$user = new User();
if(isset($_POST['reg']))
{
    $name = $_POST['username'];
    $mail = $_POST['email'];
    $pass = $_POST['password'];

    $user->InsertUser($name,$mail,$pass);
}

?>