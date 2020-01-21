<html >
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login & Register</title>
        <script src="js/Register_validation.js"> </script>
        <script src="js/jquery-3.3.1.min.js" ></script>
    </head>

    <body>
        <?php include("./header.php");?>
        <div class="form" style="margin-top:5%">

            <ul class="tab-group">
                <li class="tab  "><a href="#signup">Register</a></li>
                <li class="tab active"><a href="#login">Log In</a></li>
            </ul>

            <div class="tab-content">





                <div id="login">   
                    <h1>Welcome Mover!</h1>
                    <span style="color:red; font-weight:bold; position:relative; bottom:15px;" ><?php if( !empty( $_REQUEST['Message'] )     ){echo $_REQUEST['Message'];} ?></span>

                    <form action="login1.php" method="post">

                        <div class="field-wrap">
                            <label>
                                UserName<span class="req"></span>
                            </label>
                            <input name="Username" type="text"required autocomplete="off"/>
                        </div>

                        <div class="field-wrap">
                            <label>
                                Password<span class="req"></span>
                            </label>
                            <input name="Password" type="password"required autocomplete="off"/>
                        </div>
                        <div class="field-wrap">
                            <input type="checkbox" name="remember_me" id="remember_me"><label style="top:-30px;left:100px;font-size: 40px;">Remember Me</label>
                        </div>
                        <br>
                        <button class="button button-block"/>Log In</button>
                    </form>
            </div>



            <div id="signup">   
                <h1>Join Us! </h1>

                <form action="signup.php" method="post">

                    <div class="top-row">
                        <div class="field-wrap">
                            <label>
                                Name<span class="req">*</span>
                            </label>
                            <input  onblur="validateFName(this)" name="fullname" id="fullname" type="text" required autocomplete="off" />
                            <span style="color:red; display:block; margin-bottom:20px;" id="name"></span>

                        </div>

                        <div class="field-wrap">
                            <label>
                                User Name<span class="req">*</span>
                            </label>
                            <input onblur="checkuserr()" id="UserNamee" name="username" type="text"required autocomplete="off"/>
                            <span style=" color:red; display:block; margin-bottom:20px;" id="usernamE"> </span>
                        </div>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Email<span class="req">*</span>
                        </label>
                        <input onblur="checkmail()" id="Email" name="Email" type="email"required autocomplete="off"/>
                        <span style=" color:red; display:block; margin-bottom:20px;" id="mail"></span>

                    </div>

                    <div class="field-wrap">
                        <label>
                            University ID<span class="req">*</span>
                        </label>
                        <input onblur="validateUniID(this)" name="id" type="text"required autocomplete="off"/>
                        <span style="color:red; display:block; margin-bottom:20px;" id="uniID"></span>

                    </div>

                    <div class="field-wrap">
                        <label>
                            Password<span class="req">*Minimum 6 characters!</span>
                        </label>
                        <input  onblur="validatepassword(this)"  name="password"  type="password"required autocomplete="off"/>
                        <span style="color:red; display:block; margin-bottom:20px;" id="password"></span>
                    </div>
                    <button type="submit" onclick="return check();" class="button button-block"/>Register</button>

                </form>

        </div>


        </div><!-- tab-content -->

    </div> <!-- /form -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="script.js"></script>

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

</body>
</html>