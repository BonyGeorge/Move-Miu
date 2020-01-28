<?php 
session_start();
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 

require 'composer/vendor/autoload.php'; 

date_default_timezone_set('Etc/UTC'); 

$mail = new PHPMailer(TRUE);
$mail->SMTPOptions = array('ssl'=>array('verify_peer'=>false, 'verify_peer_name'=>false, 'allow_self_signed'=>true));
$mail->isSMTP(); 
$mail->Host = 'smtp.gmail.com'; 
$mail->Port = 587; 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'tls'; 
$mail->Username = 'move20miu2020@gmail.com'; 
$mail->Password = 'rywuqlxruswomhuj'; 
$mail->setFrom('move20miu2020@gmail.com', 'lol'. ' from move'); 
$mail->CharSet = 'utf-8';
$mail->isHTML(true);
$uname = 'islam';
$mailsubject = 'lol';
$mailcontent = 'lol';
$mail->Subject = 'lol';
$email_vars = array(
    'name' => $uname,
    'content' => $mailcontent,
);
$body = file_get_contents('htmlemail.html');
if(isset($email_vars)){
    foreach($email_vars as $k=>$v){
        $body = str_replace('{'.strtoupper($k).'}', $v, $body);
    }
}
$mail->MsgHTML($body);
//$mail->Body = "$mailcontent";
$mail->addAddress("dashadeshozz@gmail.com", "$uname");
$mail->send(); */
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
        <div class="sec-text-cont">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur imperdiet
            nibh, ut vestibulum diam sollicitudin sit amet. Nam faucibus sollicitudin erat, quis efficitur justo
            bibendum vitae. Quisque ornare malesuada lorem sit amet posuere. Curabitur interdum, nisi at porta
            scelerisque, mauris enim blandit quam, ut volutpat justo enim et libero. Aenean vel massa nisi. Quisque at
            tempor mi, et rhoncus arcu. Vivamus convallis nibh vitae ex auctor tempus. Donec faucibus mi eu mauris
            tempus egestas. Curabitur a nisi vitae elit dignissim facilisis sit amet quis dolor. Nulla convallis purus
            elit, quis feugiat lorem interdum at. Phasellus dolor eros, hendrerit ut est tincidunt, iaculis pulvinar
            nibh. Mauris velit ligula, gravida quis accumsan ut, interdum a lacus.

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
            <div class="event">
                <div class="img-side">
                    <img src="http://placekitten.com/g/1200/1200">
                </div>
                <div class="text-side">
                    <h2>Event Name (2019/01/01)</h2>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur imperdiet nibh, ut vestibulum
                    diam sollicitudin sit amet. Nam faucibus sollicitudin erat, quis efficitur justo bibendum vitae.
                    Quisque ornare malesuada lorem sit amet posuere. Curabitur interdum, nisi at porta scelerisque,
                    mauris enim blandit quam, ut volutpat justo enim et libero. Aenean vel massa nisi. Quisque at tempor
                    mi, et rhoncus arcu. Vivamus convallis nibh vitae ex auctor tempus. Donec faucibus mi eu mauris
                    tempus egestas.
                    <div class="r-cont"><a href="#">
                            <div class="read-more">Read More</div>
                        </a></div>
                </div>
            </div>
        </div>
        <div class="r-cont r-cont-center"><a href="../Pages/events.php">
                <div class="read-more">View All</div>
            </a></div>
            </div>
    <!-- Events END -->
    <?php include("../Template/footer.html");?>
    <!-- Body END -->
    <script type="text/javascript" src="../js/slider.js"></script>
</body>
</html>