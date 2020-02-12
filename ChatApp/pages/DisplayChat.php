<?php
include('classes.php');

$chat  = new Chat();
try{
$chat->DisplayChat();
}
catch(Exception $e)
{
    
}

?>