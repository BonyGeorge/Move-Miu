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
    <link rel="icon" sizes="128x128" href="./images/fav.png">
    <meta name="theme-color" content="#93ff91">
    <title>Move</title>
  </head>
  <body>
<!--   Header START   -->
<?php if(isset($_SESSION["type"])){
        if($_SESSION["type"]=="admin"){
        include("../Operations/admin_header.php"); }
        else include("../Template/header.php");}
        else
        include("../Template/header.php");?>  
<div class="sec-cont sec-cont-s">
  <div class="h-text">About Us</div>
  <div class="events-cont about-us-cont">
    <!-- <h1>unfortunately, We don't have any events right now.</h1> -->
    <div class="event">
      <div class="img-side">
        <img src="http://placekitten.com/g/1200/1200">
      </div>
      <div class="text-side">
        <h2>Vision</h2>
        To become a role model for student activities in Egyptian universities by developing our club members as well as the community.
      </div>
    </div>

    <div class="event">
      <div class="img-side">
        <img src="http://placekitten.com/g/1200/1200">
      </div>
      <div class="text-side">
        <h2>Mission</h2>
        To develop all of our targets: MOVE members, MIU students and members of the Egyptian community, through shifting their lives to more productive ones, raising our social responsibility towards the community.
      </div>
    </div>

    <div class="event">
      <div class="text-side">
        <h2>Founding date</h2>
        18/ 2/ 2008
    </div>
  </div>
</div></div>

<script type="text/javascript" src="../js/slider.js"></script>
  </body>
</html>
<?php include("../Template/footer.html");?>
