<?php 
session_start(); ?>
<!DOCTYPE HTML>
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
        <title>Move</title>
        <style type="text/css">
            
hr.botm-line {
    height: 3px;
    width: 450px;
    background: #32c08c;
    position: relative;
    border: 0;
    margin: 20px 0 20px 0;
}
        </style>
    </head>
    <body>
        <!--   Header START   -->
        <?php if(isset($_SESSION["type"])){
        if($_SESSION["type"]=="admin"){
        include("../Operations/admin_header.php"); }
        else include("../Template/header.php");}
        else
        include("../Template/header.php");?>  
        <!--   Header END   -->
        <!-- Body START -->
        <!-- About Us START -->
     <div class="sec-cont sec-cont-s">
            <div class="h-text">Events</div>
            <div class="events-cont">
                <!-- <h1>unfortunately, We don't have any events right now.</h1> -->
                

                <?php 
                $conn = mysqli_connect('localhost', 'root', '', 'move');
                $query = "SELECT * FROM event";
                $result = mysqli_query($conn,$query);

                $noOfEvents =  mysqli_num_rows($result);
                $y=0;
                while ($value = mysqli_fetch_array($result)) {

                $imgs_arr = [];
                $imgs_arr=unserialize($value['image']);
                $count = count($imgs_arr);
                    echo 
                        "<div class='event'>
                        <div class='img-side'>";
             for ($i=0;$i<$count;$i++){
                 echo"<img class='mySlides{$y} img-rounded' src='../Operations/images/{$imgs_arr[$i]}' style = 'width:50%;'>";
             }
                $y += 1;
            
            echo"
            </div>
            <div class='text-side'>
                <h2>
                $value[name]  $value[date]</h2>
                $value[body]

            </div>
            </div> <br> <br> <br>        <center>  <hr class='botm-line'></center>
        ";
}?>
            </div>
        </div>
        <!-- About Us END -->
        <?php include('../Template/footer.html');?>
        <!-- Body END -->
        <script type="text/javascript" src="../js/slider.js"></script>
        <script type="text/javascript">
    <?php  for($p=0;$p<$noOfEvents;$p++){  
    echo"
                var myIndex{$p} = 0;
            carousel{$p}();
            function carousel{$p}() {
        var i;

        var x = document.getElementsByClassName('mySlides{$p}');
        for (i = 0; i < x.length; i++) {
            x[i].style.display = 'none';  
        }
        myIndex{$p}++;
        if (myIndex{$p} > x.length) {myIndex{$p} = 1}    
        x[myIndex{$p}-1].style.display = 'block';  
        setTimeout(carousel{$p}, 2000); // Change image every 2 seconds
        }"; 
            } ?>

    </script>
    </body>
</html>
