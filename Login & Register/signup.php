<?php 
session_start();
include('../DataBase/Database.php');
$DB = new Database();

if(isset($_POST['sumb'])){
    $name = filter_var($_POST["fullname"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["Email"], FILTER_SANITIZE_EMAIL);
    $username= filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $id= filter_var($_POST["id"], FILTER_VALIDATE_INT);
    $password= filter_var($_POST["password"], FILTER_SANITIZE_STRING);
      try{
            $sql="insert into users(name,email,universityid,username,password,type) values('".$name."' ,  '".$email."' ,  '".$id."' , '".$username."' , '".sha1($_POST["password"])."','user' )";
            $DB->query($sql);
            $DB->execute();
        
      }catch (PDOException $e) {
            header('Location:login.php');
        }
        header('Location:login.php');
}
?>