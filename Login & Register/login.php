 <!DOCTYPE HTML>
 <html>

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login & Register</title>
     <script src="../js/Register_validation.js"> </script>
     <script src="../js/jquery-3.3.1.min.js"></script>
     <link rel="stylesheet" href="../css/style.css">

 </head>

 <body>
     <img src="Move.jpeg" id="image">
     <?php include("../Template/header.php");?>



     <div class="form" id="square">


         <ul class="tab-group">
             <li class="tab  "><a href="#signup">Register</a></li>
             <li class="tab active"><a href="#login">Log In</a></li>
         </ul>
         <div class="tab-content">
             <div id="login">
                 <h1 id="headercss">Welcome Movers!</h1>
                 <span
                     style="color:red; font-weight:bold; position:relative; bottom:15px;"><?php if( !empty( $_REQUEST['Message'] )){echo $_REQUEST['Message'];} ?></span>
                 <form action="login1.php" method="post">
                     <div class="field-wrap">
                         <label id="user">
                             User Name:<span class="req"></span>
                         </label>
                         </br>
                         <input name="Username" id="rcorners2" placeholder="User Name" type="text" required
                             autocomplete="off" />
                     </div>

                     <div class="field-wrap">
                         <label id="pass">
                             Password:<span class="req"></span>
                         </label>
                         </br>
                         <input name="Password" id="rcorners2" placeholder="Password" type="password" required
                             autocomplete="off" />
                     </div>
                     <div class="field-wrap">
                         <input type="checkbox" name="remember_me" id="remember_me"><label id="remember">Remember
                             Me</label>
                     </div>
                     <a id="forgetPass" href="#" onclick="document.getElementById('smail').style.display='block'"
                         style="margin-left:23%;">Forget Your Password?!</a><br><br><br><br><br><button
                         class="button button-block" id="buttonLog">Log In</button>
                 </form>
             </div>
             <div id="signup">
                 <h1 id="headercss">Join Us! </h1>

                 <form action="signup.php" method="post">

                     <div class="top-row">
                         <div class="field-wrap">
                             <label id="fontname" style="margin-top:-3%;">
                                 Full Name:<span class="req">*</span>
                             </label>
                             <input onblur="validateFName(this)" name="fullname" id="fullname" type="text" required
                                 autocomplete="off" />
                             <span style="color:red; display:block; margin-bottom:20px;" id="name"></span>

                         </div>

                         <div class="field-wrap">
                             <label id="font" style="margin-top:-3%;">
                                 User Name:<span class="req">*</span>
                             </label>
                             <input onblur="checkuserr()" id="UserNamee" name="username" type="text" required
                                 autocomplete="off" />
                             <span style=" color:red; display:block; margin-bottom:20px;" id="usernamE"> </span>
                         </div>
                     </div>

                     <div class="field-wrap">
                         <label id="font" style="margin-top:-7%;">
                             Email:<span class="req">*</span>
                         </label>
                         <input onblur="checkmail()" id="Email" name="Email" type="email" style="margin-top:-70px;"
                             required autocomplete="off" />
                         <span style=" color:red; display:block; margin-bottom:20px;" id="mail"></span>

                     </div>

                     <div class="field-wrap">
                         <label id="font" style="margin-top:-5%;">
                             University ID:<span class="req">*</span>
                         </label>
                         <input onblur="validateUniID(this)" name="id" type="text" required autocomplete="off"
                             id="id" />
                         <span style="color:red; display:block; margin-bottom:20px;" id="uniID"></span>

                     </div>

                     <div class="field-wrap">
                         <label id="font" style="margin-top:-6%;">
                             Password:
                         </label>
                         <span class="req" id="font" style=" display: inline-block;">*Minimum 6 characters!</span>
                         <input onblur="validatepassword(this)" name="password" type="password" id="passReg" required
                             autocomplete="off" />
                         <span style="color:red; display:block; margin-bottom:20px;"></span>
                     </div>
                     <button type="submit" onclick="return check();" class="button button-block" id="buttonLog"
                         name="sumb">Register</button>
                 </form>

             </div>
         </div>
     </div><!-- tab-content -->
     </div> <!-- /form -->
     <br><br><br>
     <div id="smail" class="modal">
         <form class="modal-content animate" method="POST" action="../Operations/sendpwmail.php">
             <div class="imgcontainer">
                 <script>
                 var modal = document.getElementById('smail');
                 // When the user clicks anywhere outside of the modal, close it
                 window.onclick = function(event) {
                     if (event.target == modal) {
                         modal.style.display = "none";
                     }
                 }
                 </script>
                 <span onclick="document.getElementById('smail').style.display='none'" class="close"
                     title="Close Modal">&times;</span>
             </div>

             <div class="container" action='../'>
                 <center>
                     <h1>
                         <h3>Send change password mail</h3>
                     </h1>
                 </center>
                 <input id="username" type="text" placeholder="Email" name="mail" required>
                 <center><input type='submit' id='Reset' name='submitCpw' class='btn btn-appoint' value='Reset'>
                 </center>
             </div>
         </form>
     </div>
     <br><br>
     <script src="../js/script.js"></script>
     <script type="text/javascript" src="../js/slider.js"></script>
 </body>

 </html>
 <?php include('../Template/footer.html');?>