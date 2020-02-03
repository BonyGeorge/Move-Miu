
<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="We're Movers">
        <meta name="keywords" content="Move Club,Move,MIU Club,Movers">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="icon" sizes="128x128" href="../images/fav.png">
        <meta name="theme-color" content="#93ff91">

        <title>Scan QR Code </title>
        <script type="text/javascript" src="../js/instascan.min.js"></script>
        <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    </head>
    <body>

        <?php 
if(isset($_SESSION["type"])){
if($_SESSION["type"]=="admin"){
include("../Operations/admin_header.php"); }
else include("../Template/header.php");}
else
include("../Template/header.php");
?>  
        <div style="text-align:center; " >
          <br>
          <br>
           <img src="../images/logo.png" width="10%">
           <br>
            <video id="preview" width="25%" position="center" ></video>
            <br>
            <br>
            <p style="color:green; font-weight:bold" id="test"></p>
        </div>
        <script type="text/javascript">
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            scanner.addListener('scan', function (content) {
                scan(content);
            });
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
            function scan(content) { 
               
                jQuery.ajax({
                    url: "ajax.php",
                    data:'id='+content,
                    type:"POST",
                    success:function(data)
                    {
                        document.getElementById('test').innerHTML=data;
                    }
                });
            }
        </script>

    </body>
</html>