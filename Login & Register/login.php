<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login & Register</title>
        <script src="../js/Register_validation.js"> </script>
        <script src="../js/jquery-3.3.1.min.js" ></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="icon" sizes="128x128" href="../images/fav.png">
        <style>
        /* Regiseer */
        #font{  
color: Green;
font-family: Arial, Helvetica, sans-serif;
font-size: 150%;
font: italic  27px/30px;
top:-23px;

}

        #UserNamee {
  border-radius: 25px;
  border: 2px solid #73AD21;
  padding: 20px; 
  width: 100%;
  height: 50px;  
  
}
#fullname {
  border-radius: 25px;
  border: 2px solid #73AD21;
  padding: 20px; 
  width: 100%;
  height: 50px;  
  
}
#Email {
  border-radius: 25px;
  border: 2px solid #73AD21;
  padding: 20px; 
  width: 100%;
  height: 20px;  

  
}
#id {
  border-radius: 25px;
  border: 2px solid #73AD21;
  padding: 15px; 
  width:100%;
  height: 20px;  
  
}
#passReg {
  border-radius: 20px;
  border: 2px solid #73AD21;
  padding: 10px; 
  width: 100%;
  height: 50px;  

  
}

/* Login css */
#rcorners2 {
  border-radius: 25px;
  border: 2px solid #73AD21;
  padding: 20px; 
  width: 100%;
  height: 50px;  
  
}
#user{

  color: Green;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 200%;
  font: italic  27px/30px;
  top:-23px;
  
}
#pass{

color: Green;
font-family: Arial, Helvetica, sans-serif;
font-size: 200%;
font: italic  27px/30px;
top:-23px;

}

h1 {
  text-shadow: 2px 2px #7CFC00;
  color: Green;
  font-family: verdana;
  font-size: 300%;
   height:100%;

  font: italic bold 40px/30px Georgia, serif;


}

#remember_me {
width: 45px;
height: 15px;
background: #555;
margin: 20px 80px;
left:305px;
top:0px;

position: relative;
border-radius: 5px;
}
#remember {

  color: Green;
  font-family: verdana;
  font-size: 300%;
  font: italic bold 12px/30px Georgia, serif;

}
#image {

/* margin-bottom:-20%; */
margin-top:10%;
margin-left:200px;
height: 620px;
width: 50%;

}
#square {

    margin-top:-50%;
    margin-left:1070px;
    height: 622px;
  width: 30%;

}

#buttonLog {

margin-top:-10%;
margin-left:100px;
height: 10%;
width: 300px;

}
#forgetPass{
    margin-top:-50px;

    font-size: 20px;


height: 50px;
width: 100px;
}



</style>
    </head>
    
    <body>
    <img src="Move.jpeg"  id="image"> 
    <?php include("../Template/header.php");?>

   

        <div class="form" id="square" >
       

            <ul class="tab-group">
                <li class="tab  "><a href="#signup">Register</a></li>
                <li class="tab active"><a href="#login">Log In</a></li>
            </ul>
            <div class="tab-content">
                <div id="login">   
                    <h1>Welcome Movers!</h1>
                    <span style="color:red; font-weight:bold; position:relative; bottom:15px;" ><?php if( !empty( $_REQUEST['Message'] )){echo $_REQUEST['Message'];} ?></span>
                    <form action="login1.php" method="post">
                        <div class="field-wrap">
                            <label id="user">
                                User Name:<span  class="req"></span>
                            </label>
                            </br>
                            <input name="Username" id="rcorners2" placeholder="User Name" type="text"required autocomplete="off"/>
                        </div>

                        <div class="field-wrap">
                            <label id="pass">
                                Password:<span class="req"></span>
                            </label>
                            </br>
                            <input name="Password" id="rcorners2" placeholder="Password" type="password"required autocomplete="off"/>
                        </div>
                        <div class="field-wrap">
                            <input type="checkbox"  name="remember_me" id="remember_me"><label id="remember" style="top:-15px;left:230px;font-size: 20px;">Remember Me</label>
                        </div>
                        <br>
                        
            
                        <button class="button button-block" id="buttonLog">Log In</button>
                        <a id="forgetPass">Forget Password</a>
                    </form>
            </div>
            <div id="signup">
                <h1>Join Us! </h1>

                <form action="signup.php" method="post">

                    <div class="top-row">
                        <div class="field-wrap">
                            <label>
                                Full Name<span class="req">*</span>
                            </label>
                            <input onblur="validateFName(this)" name="fullname" id="fullname" type="text" required
                                autocomplete="off" />
                            <span style="color:red; display:block; margin-bottom:20px;" id="name"></span>

                        </div>

                        <div class="field-wrap">
                            <label id="font" style="margin-top:-3%;">
                                User Name:<span class="req" >*</span>
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
                        <input onblur="checkmail()" id="Email" name="Email" type="email"  style="margin-top:-70px;" required autocomplete="off" />
                        <span style=" color:red; display:block; margin-bottom:20px;" id="mail"></span>

                    </div>

                    <div class="field-wrap">
                        <label id="font" style="margin-top:-5%;">
                            University ID:<span class="req">*</span>
                        </label>
                        <input onblur="validateUniID(this)" name="id" type="text" required autocomplete="off" id="id" />
                        <span style="color:red; display:block; margin-bottom:20px;" id="uniID"></span>

                    </div>

                    <div class="field-wrap">
                        <label id="font" style="margin-top:-6%;">
                            Password:<span class="req" style=" display: inline-block;">*Minimum 6 characters!</span>
                        </label>
                        <input onblur="validatepassword(this)" name="password" type="password" id="passReg" required
                            autocomplete="off" />
                        <span style="color:red; display:block; margin-bottom:20px;"></span>
                    </div>
                    <button type="submit" onclick="return check();" class="button button-block" id="buttonLog">Register</button>

                </form>

                </div>
                </div>                
        </div><!-- tab-content -->
    </div> <!-- /form -->
    <br><br><br>
    <script src="../js/script.js"></script>
    <script type="text/javascript" src="../js/ .js"></script>
 </body>
</html>
<?php include('../Template/footer.html');?>
