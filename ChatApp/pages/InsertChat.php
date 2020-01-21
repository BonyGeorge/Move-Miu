
<?php
include('classes.php');
session_start();
$chat = new Chat();
if(isset($_POST['chats']))
{  
    $id = $_SESSION['id'];
    $text = $_POST['chats'];
    $chat->InsertChat($id,$text);
}
?>