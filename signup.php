<?php 
session_start();
include('Database.php');
$DB = new Database();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = filter_var($_POST["fullname"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["Email"], FILTER_SANITIZE_EMAIL);
    $username=$_POST['username'];
    $id=$_POST["id"];
    $password=$_POST["password"];
      try{
            $sql="insert into users(name,email,universityid,username,password,type) values('".$name."' ,  '".$email."' ,  '".$id."' , '".$username."' , '".$password."','user' )";
            $DB->query($sql);
            $DB->execute();
        
       
      }catch (Exception $e) {
            header('Location:login.php');
        }

        header('Location:login.php');
}
?>