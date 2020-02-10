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

.loader {
    position: relative;
    left: 50%;
    text-align: center;
    padding: 1em;
    margin: 0 auto 1em;
    vertical-align: top;
    display: none;
}

/*
  Set the color of the icon
*/
svg path,
svg rect {
    fill: #46db33;
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
                window.clearInterval(cid);
                var clone = $('.loader').clone();
                clone.prependTo($('#text'));
                clone.css('display', 'inline-block');
                cctr += 10;
                $.ajax({
                    method: 'POST',
                    url: 'pages/DisplayChat.php',
                    data: {
                        cctr: cctr
                    },
                    success: function(msg) {
                        // setTimeout(function() {
                        clone.remove();
                        cid = setInterval(function() {
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
                        }, 500)
                        $('#text').html(msg);
                        $('#text')[0].scrollTop = $('#text')[0].scrollHeight -
                            scrollH;
                        //}, 2000)
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


        var cid = setInterval(function() {
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
        }, 500)

        function chatint() {
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
            }, 500)
        }




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
    <div class='loader' title="2">
        <svg version='1.1' id='loader-1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'
            x='0px' y='0px' width='40px' height='40px' viewBox='0 0 50 50' style='enable-background:new 0 0 50 50;'
            xml:space='preserve'>
            <path fill='#000'
                d='M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z'>
                <animateTransform attributeType='xml' attributeName='transform' type='rotate' from='0 25 25'
                    to='360 25 25' dur='0.6s' repeatCount='indefinite' />
            </path>
        </svg>
    </div>
</body>

</html>

<?php include('../Template/footer.html');?>