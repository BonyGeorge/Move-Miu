<?php 
<<<<<<< HEAD
session_start();
if(!isset($_SESSION['username'])){
||||||| merged common ancestors
if(!isset($_SESSION['username'])){
=======
session_start();
if(!isset($_SESSION['username']))
{
>>>>>>> 785095e78b0158a5723eacb3cb4408cec549e76d
    header('location:../pages/');
}
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/all.css">
<link rel="icon" type="image/png" href="img/titleBar.png" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
button
{
    border: none;
    outline: 0;
    display: inline-block;
    padding: 10px 25px;
    background-color: #fff;
    text-align: center;
    cursor: pointer;
    border-radius: 4px;
}
</style>
<script src="js/jQuery.js"></script>
<script>
$(document).ready(function()

    {
        setTimeout(function() {
            var objDiv = $('#text');
            if (objDiv.length > 0) {
                objDiv[0].scrollTop = objDiv[0].scrollHeight;
            }

        }, 100);

        $('#chat').keyup(function(e) {
            if (e.keyCode == 13) {

                var chats = $('#chat').val();

                $.ajax({
                    method: 'POST',
                    url: 'pages/InsertChat.php',
                    data: {
                        chats: chats
                    },
                    success: function() {
                        console.log('ok');
                        $('#chat').val('');
                    }
                })
                $('#text').load('pages/DisplayChat.php');
                setTimeout(function() {
                    var objDiv = $('#text');
                    if (objDiv.length > 0) {
                        objDiv[0].scrollTop = objDiv[0].scrollHeight;
                    }
                }, 500)
            }
        })
        $('button').click(function() {
            var chats = $('#chat').val();

            $.ajax({
                method: 'POST',
                url: 'pages/InsertChat.php',
                data: {
                    chats: chats
                },
                success: function() {
                    console.log('ok');
                    $('#chat').val('');


                }

            })
            $('#text').load('pages/DisplayChat.php');
            setTimeout(function() {
                var objDiv = $('#text');
                if (objDiv.length > 0) {
                    objDiv[0].scrollTop = objDiv[0].scrollHeight;
                }

            }, 500)



        })
        $('#text').load('pages/DisplayChat.php');
        setInterval(function() {
            $('#text').load('pages/DisplayChat.php');

        }, 500);

    })
</script>
<?php session_start() ?>
<?php

if(isset($_SESSION['id']) && !empty($_SESSION['id']))
{
    echo '';
}else
{
    header('location:../pages/index.php');
}
if(isset($_SESSION['type']))
{
    if($_SESSION['type'] == 'admin')
     include('../Operations/admin_header.php');
    else if($_SESSION['type'] == 'user')
     include('../Template/header.php');
}  
?>
<center>
    <h1>Welcome <?php echo $_SESSION['username'];?>.</h1>
</center>

<div id='text'></div>

<div id='container' style='width:100%; border:1px solid #87c197;'>
    <textarea class="form-control" id="chat" placeholder="Enter Your Reply..."
        style='border-style:none none  none; border-color:black; width:100%; display:block;box-sizing:border-box;border-width:1px; margin-bottom:1px;'></textarea>
    <div style='width:100%; box-sizing:border-box; height:35px;padding:5px;'>
        <button style='float:right'><i class="fa fa-paper-plane read-more" aria-hidden="true"></i>
        </button>
    </div>
</div>