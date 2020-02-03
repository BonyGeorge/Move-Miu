<?php 
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="We're Movers">
    <meta name="keywords" content="Move Club,Move,MIU Club,Movers">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="icon" sizes="128x128" href="./images/fav.png">
    <meta name="theme-color" content="#93ff91">
    <title>Move</title>
</head>

<body>
    <!--   Header START   -->
    <?php if(isset($_SESSION["type"])){

    if($_SESSION["type"]=="admin"){
        include("../Operations/admin_header.php");
    }else 
    include("../Template/header.php");
}
        else
            include("../Template/header.php");?>

    <!--   Header END   -->
    <!--      -->
    <!--      -->
    <!--   Top Slider START   -->
    <div class="slider-cont">
        <div class="sliders" id="sliders">
            <div class="slider">
                <img src="http://placekitten.com/g/1600/900" />

                <h1>Lorem ipsum</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <div class="r-cont"><a href="#">
                        <div class="read-more">Read More</div>
                    </a></div>

            </div>
            <div class="slider" style="left:100%;">
                <img src="http://placekitten.com/g/1300/500" />

                <h1>Hey</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <div class="r-cont"><a href="#">
                        <div class="read-more">Read More</div>
                    </a></div>

            </div>

            <div class="slider" style="left:200%;">
                <img src="http://placekitten.com/g/1600/800" />

                <h1>Lorem ipsum</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <div class="r-cont"><a href="#">
                        <div class="read-more">Read More</div>
                    </a></div>

            </div>


        </div>

        <div class="sl-b sl-prev" onclick="slide('right');"><i class="fas fa-chevron-left"></i></div>
        <div class="sl-b sl-next" onclick="slide('left');"><i class="fas fa-chevron-right"></i></div>
    </div>
    <!--   Top Slider END    -->
    <!--  -->
    <!-- Body START -->
    <!-- About Us START -->
    <div class="sec-cont">
        <div class="h-text">
            <div class="h-emoji-cont"><img src="../images/fav.png"></div>About Us
        </div>
        <div class="sec-text-cont">BE THE CHANGE YOU WANT TO SEE"

“MOVE” is based on development which is divided into:
1.Community Service Program
2. Student Development Program.

Our Color is Green: Generous, Adaptable, Understanding, Compassionate, And Practical.
        </div>
        <div class="r-cont"><a href="../Pages/about.php">
                <div class="read-more">Read More</div>
            </a></div>

    </div>
    <!-- About Us END -->
    <!--  -->
    <!-- Team START -->
    <div class="sec-cont ">
        <div class="h-text">
            <div class="h-emoji-cont"><img src="../images/fav.png"></div>Meet The Team
        </div>
        <div class="team-members-cont">
            <div class="team-member">
                <a href="#">
                    <div class="team-member-img"><img src="../images/emojis/sun_glasses.png"></div>
                    <div class="team-member-text">
                        <h3>Omar Nasr</h3>
                        <p>President.</p>
                    </div>
                </a>
            </div>

            <div class="team-member">
                <a href="#">
                    <div class="team-member-img"><img src="../images/emojis/sun_glasses.png"></div>
                    <div class="team-member-text">
                        <h3>Essra Mahamed</h3>
                        <p>Vice President.</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="r-cont r-cont-center"><a href="./Pages/team.php">
                <div class="read-more">View All</div>
            </a></div>
        <br><br>
        <div class="shape1">
            <img src="./images/shapes/2.png">
        </div>
    </div>
    <!-- Team END -->
    <!-- Events START -->
    <div class="sec ">
        <div class="h-text">
            <div class="h-emoji-cont"><img src="../images/fav.png"></div>Our Events
        </div>
        <div class="events-cont">
            <!-- <h1>unfortunately, We don't have any events right now.</h1> -->
            <?php 
                $conn = mysqli_connect('localhost', 'root', '', 'move');
                $query = "select *from event ORDER BY id DESC LIMIT 1;";
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
    </div> <br> <br> <br><div class='r-cont r-cont-center'><a href='../Pages/events.php'>
                <div class='read-more'>View All</div>
            </a></div>
";
}?>
            </div>
        </div>
        
            </div>
    <!-- Events END -->
    <?php include("../Template/footer.html");?>
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