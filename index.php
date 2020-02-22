<?php
session_start();
include('DataBase/Database.php');
$DB = new Database();
if(isset($_COOKIE['username']))
{
 $sql="SELECT * FROM users where username= '".$_COOKIE['username']."' and password = '".sha1($_COOKIE['password'])."';";
 $DB->query($sql);
 $DB->execute();
 if($DB->numRows() == 0)
 {  
     $Message = "Opps...Wrong username or password. ";
 }
 else {
     $x=$DB->getdata();
     $_SESSION['name']=$x[0]->name;
     $_SESSION['username']=$x[0]->username;
     $_SESSION['email']=$x[0]->email;
     $_SESSION['type']=$x[0]->type;
     $_SESSION['id']=$x[0]->id;
     $_SESSION['universityid']=$x[0]->universityid;
 }
}
header('location:pages/')
?>