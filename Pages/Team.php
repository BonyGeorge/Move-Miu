<?php session_start(); ?>
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

<!-- About Us START -->
<div class="sec">
 <br>
<div class="sec-text-cont" >
<div class="h-text" style="left:260px;">Our Teams.</div>
<div class="team-members-cont">
    <div class="team-member">
        <div class="team-member-img"><img src="../images/emojis/sun_glasses.png"></div>
        <div class="team-member-text"><h3>Omar Nasr</h3><p>President.</p></div>
    </div>
    <div class="team-members-cont">
    <div class="team-member">
        <div class="team-member-img"><img src="../images/emojis/sun_glasses.png"></div>
        <div class="team-member-text"><h3>Essra Mohamed</h3><p>Vice President.</p></div>
    </div></div>
  
    <div class="team-members-cont">
    <div class="team-member">
        <div class="team-member-img"><img src="../images/emojis/sun_glasses.png"></div>
        <div class="team-member-text"><h3>Hajar Munir</h3><p>HR & IT Manager.</p></div>
    </div>
    <div class="team-member">
        <div class="team-member-img"><img src="../images/emojis/sun_glasses.png"></div>
        <div class="team-member-text"><h3>Amr Khaled</h3><p>HR & IT Moderator.</p></div>
    </div>
    </div>
    
    <div class="team-members-cont">
    <div class="team-member">
        <div class="team-member-img"><img src="../images/emojis/sun_glasses.png"></div>
        <div class="team-member-text"><h3>Nourhan Magdy</h3><p>OS Manager.</p></div>
    </div>
    <div class="team-member">
        <div class="team-member-img"><img src="../images/emojis/sun_glasses.png"></div>
        <div class="team-member-text"><h3>Menna Yasser</h3><p>OS Moderator.</p></div>
        </div>
        </div>
   
    <div class="team-members-cont">
    <div class="team-member">
        <div class="team-member-img"><img src="../images/emojis/sun_glasses.png"></div>
        <div class="team-member-text"><h3>Omar Shamrookh</h3><p>OC Manager.</p></div>
    </div>
    <div class="team-member">
        <div class="team-member-img"><img src="../images/emojis/sun_glasses.png"></div>
        <div class="team-member-text"><h3>Seif Mohamed</h3><p>OC Moderator.</p></div>
    </div><div class="team-member">
        <div class="team-member-img"><img src="../images/emojis/sun_glasses.png"></div>
        <div class="team-member-text"><h3>Abdelrahman Nasser</h3><p>OC Moderator.</p></div>
    </div>
    </div>
  </div>
</div>

</div>
<!-- About Us END -->
<?php include("../Template/footer.html");?>
<script type="text/javascript" src="../js/slider.js"></script>
  </body>
</html>
