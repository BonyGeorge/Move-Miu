<?php 
session_start();
include('../DataBase/Database.php');
$DB = new Database();

if(isset($_POST['username'])){

    $username=$_POST['username'];
    $filteredname = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    if($filteredname == $username && strlen($filteredname)>3){
        try{
            $sql="SELECT * FROM users where username= '".$filteredname."'  ";
            $DB->query($sql);
            $DB->execute();
            if($DB->numRows()>0)
            {
                echo"Username already exists.";

            }

            else{
                echo'Valid Username';
            }
        }catch (Exception $e) {


        }

    }
    else{
        echo"Invalid Username";
    }

}

if(isset($_POST['mail'])){
    $mail=$_POST['mail'];
    $email = filter_var($mail, FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        try{
            $sql="SELECT * FROM users where email= '".$email."'  ";
            $DB->query($sql);
            $DB->execute();
            if($DB->numRows()>0)
            {
                echo"Email already exists.";
            }
            else{
                echo'Valid mail';

            }
        }catch (Exception $e) {


        }
    }
    else{

        echo"Invalid mail";
    }
}