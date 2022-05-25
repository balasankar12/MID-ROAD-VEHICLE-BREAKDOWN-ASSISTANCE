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
                <form action="adminlogin.php" method="post" class="login">
                    <h1>Welcome Back!</h1>
                    <div class="field-wrap">
                        <label class="for">
                            Name<span class="req">*</span>
                        </label>
                        <input type="text" name="name" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label class="for">
                            Password<span class="req">*</span>
                        </label>
                        <input type="password" name="password" required autocomplete="off" />
                    </div>
                    <?php
                		if(isset($_GET['adminlogin'])){
                    		if ('false' == $_GET['adminlogin']) {
                        	echo '<span style="color:red">Login failed!</span>';
                    		}
                		}
                	?>
                    <button class="button button-block" name="loginadmin"/>Log In</button>

                </form>

            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->
    <script src="assets/js/login.js"></script>
</body>

</html>