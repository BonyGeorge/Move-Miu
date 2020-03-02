
<?php
include('classes.php');
session_start();
$chat = new Chat();
if(isset($_POST['chats']))
{  
    $id = $_SESSION['id'];
    $text = filter_var(addslashes($_POST['chats']), FILTER_SANITIZE_STRING);
    $chat->InsertChat($id,$text);
}
?>