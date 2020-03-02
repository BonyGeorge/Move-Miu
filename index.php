<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="We're Movers">
    <meta name="keywords" content="Move Club,Move,MIU Club,Movers">
    <meta name="author" content="Move IT team.">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="icon" sizes="128x128" href="../images/fav.png">
    <meta name="google-site-verification" content="PLGm2De5VsP7uY5fIcNwVUnlHsy64_O7Q_10dMkA-ZQ" />
    <meta name="theme-color" content="#93ff91">
    <title>Move-Miu</title>
</head>
<body>
    
</body>
</html>
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
header('location:Pages/')
?>