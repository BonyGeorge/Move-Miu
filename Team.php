
<?php 
session_start(); ?>

<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="We're Movers">
    <meta name="keywords" content="Move Club,Move,MIU Club,Movers">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="icon" sizes="128x128" href="./images/fav.png">
    <meta name="theme-color" content="#93ff91">
    <title>Move</title>
  </head>
  <body>
<!--   Header START   -->
<?php if(isset($_SESSION["type"])){
        if($_SESSION["type"]=="admin"){
        include("./admin_header.php"); }
        else include("./header.php");}
        else
        include("./header.php");?>  
<!--   Header END   -->
<!--      -->
<!--      -->
<!--  -->
<!-- Body START -->
<!-- About Us START -->
<div class="sec-cont sec-cont-s">
  <div class="h-text">Team</div>

<div class="sec-text-cont">
  <div class="team-members-cont">
    <div class="team-member">
        <div class="team-member-img">Image</div>
        <div class="team-member-text"><h3>Name</h3><p>Vice President</p></div>
    </div>

    <div class="team-member">
        <div class="team-member-img"><img src="https://scontent-cai1-1.xx.fbcdn.net/v/t1.0-9/41368493_10215026007037160_7613683814040076288_n.jpg?_nc_cat=110&_nc_ht=scontent-cai1-1.xx&oh=10127f77bdc3e6b5f30a76e5d21b5c3e&oe=5C69FAC5"></div>
        <div class="team-member-text"><h3>Karim Ehab</h3><p>President</p></div>
    </div>

    <div class="team-member">
        <div class="team-member-img">Image</div>
        <div class="team-member-text"><h3>Name</h3><p>Vice President</p></div>
    </div>
    <!--  -->
    <!--  -->
    <h1>Committee Name</h1>
    <div class="team-member">
        <div class="team-member-img">Image</div>
        <div class="team-member-text"><h3>Name</h3><p>Committee Name</p></div>
    </div>



    <div class="team-member">
        <div class="team-member-img">Image</div>
        <div class="team-member-text"><h3>Name</h3><p>Committee Name</p></div>
    </div><div class="team-member">
        <div class="team-member-img">Image</div>
        <div class="team-member-text"><h3>Name</h3><p>Committee Name</p></div>
    </div>


    <div class="team-member">
        <div class="team-member-img">Image</div>
        <div class="team-member-text"><h3>Name</h3><p>Committee Name</p></div>
    </div>
    <!--  -->
    <!--  -->
    <h1>Committee Name</h1>
    <div class="team-member">
        <div class="team-member-img">Image</div>
        <div class="team-member-text"><h3>Name</h3><p>Committee Name</p></div>
    </div>



    <div class="team-member">
        <div class="team-member-img">Image</div>
        <div class="team-member-text"><h3>Name</h3><p>Committee Name</p></div>
    </div><div class="team-member">
        <div class="team-member-img">Image</div>
        <div class="team-member-text"><h3>Name</h3><p>Committee Name</p></div>
    </div>


    <div class="team-member">
        <div class="team-member-img">Image</div>
        <div class="team-member-text"><h3>Name</h3><p>Committee Name</p></div>
    </div>
    <div class="team-member">
        <div class="team-member-img">Image</div>
        <div class="team-member-text"><h3>Name</h3><p>Committee Name</p></div>
    </div>
    <div class="team-member">
        <div class="team-member-img">Image</div>
        <div class="team-member-text"><h3>Name</h3><p>Committee Name</p></div>
    </div>

    <!--  -->
    <!--  -->
  </div>
</div>

</div>
<!-- About Us END -->


<!-- Footer START -->
<div class="footer">
© 2018 <span class="f-m">Move</span><span class="f-l-m"><a href="./"><img src="./images/logo.png"></a></span><br><div>- Designed by <a href="https://www.fb.com/Mhmd.Ashf" rel="noopener noreferrer">xTrimy</a></div>
<div class="shape1">
  <img src="./images/shapes/3.png">
</div>
</div>
<!-- Footer END -->
<!-- Body END -->
<script type="text/javascript" src="./js/slider.js"></script>
  </body>
</html>
