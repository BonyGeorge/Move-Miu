<?php
include('classes.php');

$user = new User();


if(isset($_POST['login']))
{
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    $user->UserLogin($mail,$pass);
}


?>