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
    color: #13d600;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    border: 2px solid #13d600;
}

input[type=submit]:hover {
    background: #13d600;
    color: white;
    border: 2px solid #13d600;
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

//button:hover {
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

img.avatar {
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
    <link rel="stylesheet" href="../css/style.css">
</head>
<div id="header">
    <div class="logo-cont">
        <div class="logo"><a href="./" style="">
                <img src="../images/logo.png"></a>
        </div>
    </div>
    <div class="nav-buttons-cont">
        <a href="../Login%20&%20Register/logout.php">
            <div class="nav-button nav-button-sl">Logout</div>
        </a>
        <div class="nav-button nav-button-about">About <i class="fas fa-user-tie"></i>
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
                                    Get to know about the club
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
                                Team<br>
                                <div class="about-button-text-small">
                                    Get to know about the club members
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!--  -->
            </div>
        </div>
        <a href="../pages/Events.php">
            <div class="nav-button">Events <i class="fas fa-calendar"></i></div>
        </a>
        <a onclick="document.getElementById('id99').style.display='block'" style="width:auto;">
            <div class="nav-button">Add Admin <i class="fas fa-user"></i></div>
        </a> <!-- Add Admin-->
        <a onclick="document.getElementById('id100').style.display='block'" style="width:auto;">
            <div class="nav-button">Add Event <i class="fas fa-plus"></i></div>
        </a> <!-- Add event-->
        <a href='../Operations/sendmail.php' style="width:auto;">
            <div class="nav-button">Send Mail <i class="fas fa-plus"></i></div>
        </a>
        <a href='../Operations/scanQR.php' style="width:auto;">
            <div class="nav-button">Take Attendance <i class="fas fa-plus"></i></div>
        </a>
        <?php if(isset($_SESSION['type'])) { ?>
        <a href='../ChatApp/Home.php' style="width:auto;">
            <div class="nav-button">Chat Room<i class="fas fa-plus"></i></div>
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
            <div class="nav-sidebar-button">Logout <i class="fas fa-user-plus"></i> </div>
        </a>
        <?php } ?>
        <a href="../pages/">
            <div class="nav-sidebar-button">Home<i class="fas fa-home"></i> </div>
        </a>
        <a href="../pages/Team.php">
            <div class="nav-sidebar-button">Meet The Team <i class="fas fa-users"></i> </div>
        </a>
        <a href="../pages/About.php">
            <div class="nav-sidebar-button">About The Club <i class="fas fa-info-circle"></i> </div>
        </a>
        <a href="../pages/Events.php">
            <div class="nav-sidebar-button">Our Events <i class="fas fa-calendar"></i> </div>
        </a>
        <a href="../Operations/sendmail.php">
            <div class="nav-sidebar-button">Send Mail <i class="fas fa-envelope"></i> </div>
        </a>
        <a href="../ChatApp/Home.php">
            <div class="nav-sidebar-button">Chat room <i class="fas fa-comments"></i> </div>
        </a>
    </div>

</div>
<div class="sidebar-overlay" onclick="menu()" id="sidebar-overlay"></div>


<div id="id99" class="modal">
    <form class="modal-content animate" method="POST" action="changeToAdmin.php">
        <div class="imgcontainer">
            <script>
            var modal = document.getElementById('id99');
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            </script>
            <span onclick="document.getElementById('id99').style.display='none'" class="close"
                title="Close Modal">&times;</span>
        </div>

        <div class="container">
            <center>
                <h1>
                    <h3>Add New Admin</h3>
                </h1>
            </center>
            <input id="username" type="text" placeholder="Enter Username" name="username" required>
            <center><input type='submit' id='btn' name='submitAdmin' class='btn btn-appoint' value='ADD'></center>
        </div>


    </form>
</div>

<div id="id100" class="modal">
    <form class="modal-content animate" method="POST" action="../Operations/addEvent.php" enctype="multipart/form-data">
        <div class="imgcontainer">
            <script>
            var modal2 = document.getElementById('id100');
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal2) {
                    modal2.style.display = "none";
                }
            }
            </script>
            <span onclick="document.getElementById('id100').style.display='none'" class="close"
                title="Close Modal">&times;</span>
        </div>

        <div class="container">
            <center>
                <h1><b>
                        <h3>Add New Event</h3>
                    </b></h1>
            </center>

            <input id="title" type="text" placeholder="Enter Title" name="title" required>

            <input id="date" type="text" placeholder="Enter Date" name="date" required>
            <textarea id="details" type="message" placeholder="Enter Event Details" name="details" required></textarea>
            <input type="file" id="image" name="image[]" multiple>
            <center><input type='submit' id='btn' name='submitEvent' class='btn btn-appoint' value='ADD'></center>
        </div>


    </form>
</div>
<script type="text/javascript" src="../js/menu.js"></script>