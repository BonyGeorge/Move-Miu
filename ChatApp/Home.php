<?php 
session_start();
if(!isset($_SESSION['username']))
{
    header('location:../pages/');
}
else
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../css/style.css">
<link rel="icon" type="image/png" href="img/titleBar.png" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Chat room</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
button {
    background-color: white;
    border: none;
}
</style>
<script src="js/jQuery.js"></script>
<script>
var cctr = 0;
$(document).ready(function()

    {

        /* $('#chat').keyup(function(e) {
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
         }) */
        $('button').click(function() {

            var chats = $('#chat').val();
            if (chats != '') {
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
            }
            // $('#text').load('pages/DisplayChat.php');
        })
        //alert($('#text').height())
        $('#text').scroll(function() {
            scroller = $('#text');
            scrollX = $('#text').scrollTop();
            scrollH = $('#text')[0].scrollHeight;
            if ($(this).scrollTop() == 0) {
                cctr += 10;
                $.ajax({
                    method: 'POST',
                    url: 'pages/DisplayChat.php',
                    data: {
                        cctr: cctr
                    },
                    success: function(msg) {
                        $('#text').html(msg);
                        $('#text')[0].scrollTop = $('#text')[0].scrollHeight - scrollH;
                    }


                })
            }
        })
        $('#text').load('pages/DisplayChat.php', function() {

            var objDiv = $('#text');
            if (objDiv.length > 0) {
                objDiv[0].scrollTop = objDiv[0].scrollHeight;
            }

        });


        setInterval(function() {
            $.ajax({
                method: 'POST',
                url: 'pages/DisplayChat.php',
                data: {
                    cctr: cctr
                },
                success: function(msg) {
                    $('#text').html(msg);
                }


            })
        }, 500);




    })
</script>

<body>
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
        <div style='position:relative;width:100%; height:22px; right:1%'>
            <button style='float:right'><i class="fa fa-paper-plane read-more"></i>
            </button>
        </div>
    </div>
</body>

</html>

<?php include('../Template/footer.html');?>