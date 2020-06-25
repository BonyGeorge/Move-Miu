<?php
include 'phpqrcode/qrlib.php';  
session_start();
if(!isset($_SESSION['username']))
{
    header('location:../Pages/');
}
function GenerateQR($Name,$ID)
{
    $Arr =$Name.PHP_EOL.$ID;
    $File = $Arr.".png"; 
    QRcode::png($Arr); 
}

GenerateQR($_SESSION["name"],$_SESSION["universityid"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View QR</title>
</head>
<body>
    
</body>
</html>
