<?php
session_start();
if($_SESSION['type']!='admin'){header('location:../index.php');}
//include '../Operations/admin_header.php';
include '../QRcode/QRcodeFunc.php';
include '../DataBase/Database.php';
$DB = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="We're Movers">
        <meta name="keywords" content="Move Club,Move,MIU Club,Movers">
        <link rel="icon" sizes="128x128" href="../images/fav.png">
        <meta name="theme-color" content="#93ff91">
        <title>View QR</title>
</head>
<body>
    <div class="QR"><?php 
    GenerateQR($_SESSION['username'],$_SESSION['universityid']);?></div>
</body>
<?php include('../Template/footer.html');?>
</html>