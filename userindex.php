<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="assets/css/login.css" rel="stylesheet">
    <title>Mid Road Helper</title>
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>

<body class="bg-gra-02">
    <div class="form">

        <div class="tab-content">
            <div id="login">
                <form action="userlogin.php" method="post" class="login">
                    <h1>Welcome Back!</h1>
                    <div class="field-wrap">
                        <label class="for">
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="email" name="uemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label class="for">
                            Password<span class="req">*</span>
                        </label>
                        <input type="password" name="upassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                        title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete="off" />
                    </div>

                    <p class="forgot"><a href="#">Forgot Password?</a></p>
                    <p class="usermessage">Not registered? <a href="#">Sign In</a></p>
                    <?php
                        if(isset($_GET['userlogin'])){
                            if('false'==$_GET['userlogin']){
                                echo '<span style="color:red">Username or Password incorrect....</span>';
                            }
                        }
                    ?>
                    <button type="submit" class="button button-block" name="loginuser"/>Log In</button>

                </form>
                <form id="register-form" action="userregister.php" method="post" class="login">
                    <h1>Sign Up</h1>
                    <div class="field-wrap">
                        <label class="for"> Your Name<span class="req">*</span> </label>
                        <input type="text" name="uname" required autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label class="for"> Email Address<span class="req">*</span> </label>
                        <input type="email" name="uemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address" required autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label class="for"> Number<span class="req">*</span> </label>
                        <input type="number" name="unumber" pattern="[6789][0-9]{9}" title="Please enter valid phone number" required autocomplete="off" />
                    </div>
                    <div class="top-row">
                        <div class="field-wrap">
                            <label class="for"> Set A Password<span class="req">*</span> </label>
                            <input type="password" name="upassword" id="upassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                            title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete="off" />
                        </div>
                        <div class="field-wrap">
                            <label class="for"> Confirm Password<span class="req">*</span> </label>
                            <input type="password" id="uconfirmpassword" name="uconfirmpassword" onkeyup='ucheck();'
                                required autocomplete="off" />
                        </div>
                    </div>
                    <center><span id='umessage'></span></center><br>
                    <button type="submit" class="button button-block" id="uButton" />Get Started</button>
                    <p class="usermessage">Already registered? <a href="#">Log In</a></p>
                </form>

            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->
    <script src="assets/js/login.js"></script>
</body>

</html>