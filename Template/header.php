<style type="text/css">
body {
    font-family: Arial, Helvetica, sans-serif;
}

/* Full-width input fields */
input[type=text],
input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[type=message] {
    width: 1170px;
    height: 150px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[type=submit] {
    background-color: #13d600;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    border-radius: 5px;
}

input[type=submit]:hover {
    opacity: 0.8;
    border-radius: 5px;
}

/* Set a style for all buttons */
//button {
background-color: #4CAF50;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
cursor: pointer;
width: 100%;
}

button:hover {
opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

Logo.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto;
    /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%;
    /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {
        -webkit-transform: scale(0)
    }

    to {
        -webkit-transform: scale(1)
    }
}

@keyframes animatezoom {
    from {
        transform: scale(0)
    }

    to {
        transform: scale(1)
    }
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }

    .cancelbtn {
        width: 100%;
    }
}


.hid {
    visibility: hidden;
}
</style>

<head>

    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="icon" sizes="128x128" href="../images/fav.png">
    <meta name="theme-color" content="#93ff91">
    <!--
<link rel="stylesheet" href="css/normalize.css">
-->
</head>
<div id="header">
    <div class="logo-cont">
        <div class="logo"><a href="../Pages/index.php">
                <img src="../images/logo.png"></a>
        </div>
    </div>
    <div class="nav-buttons-cont">
        <?php if (!isset($_SESSION["type"])){ ?>
        <a href="../Login & Register/login.php">
            <div class="nav-button nav-button-sl">Login</div>
        </a>
        <?php } else { ?>
        <a href="../Login & Register/logout.php">
            <div class="nav-button nav-button-sl">Logout</div>
        </a>
        <?php } ?>
        <div class="nav-button nav-button-about">About<i class="fas fa-user-tie"></i>

            <div class="about-buttons-cont">
                <!--  -->
                <a href="../Pages/about.php">
                    <div class="about-button">
                        <div class="about-button-icon-cont">
                            <div class="about-button-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                        </div>
                        <div class="about-button-text-cont">
                            <div class="about-button-text">
                                About Us<br>
                                <div class="about-button-text-small">
                                    Get to know more about the club.
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!--  -->
                <!--  -->
                <a href="../Pages/team.php">
                    <div class="about-button">
                        <div class="about-button-icon-cont">
                            <div class="about-button-icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="about-button-text-cont">
                            <div class="about-button-text">
                                Our Team<br>
                                <div class="about-button-text-small">
                                    Get to know about the club members.
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!--  -->
            </div>
        </div>
        <a href="../Pages/events.php">
            <div class="nav-button">Events <i class="fas fa-calendar"></i></div>
        </a>
        <?php if(isset($_SESSION['type'])) { ?>
        <a href='../ChatApp/Home.php' style="width:auto;">
            <div class="nav-button">Chat room <i class="fas fa-comments"></i></div>
        </a>
        <?php } ?>
    </div>
    <div class="menu-button" id="menu-button" onclick="menu()">
        <div class="menu-button-bar"></div>
        <div class="menu-button-bar"></div>
        <div class="menu-button-bar"></div>
    </div>
</div>  
<div class="marg"></div>
<div class="sidebar" id="sidebar">
    <div class="nav-sidebar-buttons">
        <?php if (!isset($_SESSION["type"])){ ?>
        <a href="../Login & Register/login.php">
            <div class="nav-sidebar-button">Login <i class="fas fa-user-plus"></i> </div>
        </a>
        <?php } else { ?>
        <a href="../Login & Register/logout.php">
            <div class="nav-sidebar-button">Logout <i class="fas fa fa-sign-out"></i> </div>
        </a>
        <?php } ?>
        <a href="../Pages/team.php">
            <div class="nav-sidebar-button">Meet The Team <i class="fas fa-users"></i> </div>
        </a>
        <a href="../Pages/about.php">
            <div class="nav-sidebar-button">About The Club <i class="fas fa-info-circle"></i> </div>
        </a>
        <a href="../Pages/events.php">
            <div class="nav-sidebar-button">Our Events <i class="fas fa-calendar"></i> </div>
        </a>
        <?php if(isset($_SESSION['username'])) { ?>
        <a href="../ChatApp/Home.php">
            <div class="nav-sidebar-button">Chat room<i class="fas fa-comments"></i> </div>
        </a>
        <a href="../Operations/scanQR.php">
            <div class="nav-sidebar-button">Scan for Attendance<i class="fas fa-comments"></i> </div>
        </a>
        <?php } ?>
    </div>
</div>
<div class="sidebar-overlay" onclick="menu()" id="sidebar-overlay"></div>
</div>
<script type="text/javascript" src="../js/menu.js"></script>