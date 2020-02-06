<?php
include 'phpqrcode/qrlib.php';  
function GenerateQR($Name,$ID)
{
    $Arr =$Name.PHP_EOL.$ID;
    $File = $Arr.".png"; 
    QRcode::png($Arr); 
}
?> 
