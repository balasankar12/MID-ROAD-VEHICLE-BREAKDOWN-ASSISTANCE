<?php include('userlogin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<title>Mid Road Helper</title>
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="assets/css/head.css" /> 
    <link rel="stylesheet" href="assets/css/table.css" /> 
    <link rel="stylesheet" href="assets/css/profile.css" /> 
    <link rel="stylesheet" href="assets/css/chatbot.css" /> 
</head>

<body>
    <div class="header">
        <div class="row" >
            <div class="logo">
                <img src="assets/img/logo.png">
            </div>
            <div >
                <div style="float:right;margin-right: 100px;color:royalblue;font-size:25px;">
                    <?php echo "Welcome ".$_SESSION['username'];?>    
                </div>
                <div class="dnav">
                    <ul class="main-nav">
                        <li><a href="#" onclick="toggleVisibility('home');">HOME</a></li>
                        <li><a href="#" onclick="toggleVisibility('userprofile');">PROFILE</a></li>
                        <li><a href="#" onclick="toggleVisibility('findhs');">FIND MECHANIC</a></li>
                        <li><?php session_destroy(); echo "<a href='userindex.php'>LOGOUT</a></li>";?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="home">
        <div style="float:left;width:40%;font-size: x-large; font-family: 'Eras Bold ITC'; font-weight: 1400; font-style: inherit;  color:dimgray;margin-left:50px;margin-top:70px">
            <p>
                <strong style="color:royalblue;">
                What is Roadside Assistance?
                </strong></br></br>
                Roadside assistance is a vehicular support service offered by MidRoad Helper     to individuals who experience a vehicular breakdown. The service typically provides benefits such as getting the vehicle fixed on the spot, refueling it, towing the vehicle to the nearest garage or a specific location, extending medical assistance and much more. MidRoad Helper offers the best road assistance for cars / four wheelers and two wheelers in India.
            </p>
        </div>
        <div style="float:right;width:40%;margin-right:100px;">
            <img src="assets/img/carmechimg.jpg">
        </div>
    </div>
    <div id="userprofile" style="display: none;" >
        <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
            <h2 class="title">YOUR PROFILE</h2>
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">
                        <form method="POST">
                            <div class="row row-space">
                                <div class="col-2">
                                    <label class="label">Name</label>
                                    <input class="input--style-4" type="text" name="name" value="<?php echo $_SESSION['username'];?>" readonly>        
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <label class="label">E-Mail</label>
                                    <input class="input--style-4 js-datepicker" type="text" name="mail" value="<?php echo $_SESSION['mailid'];?>" readonly>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <label class="label">Number</label>
                                    <input class="input--style-4 js-datepicker" type="text" name="number" value="<?php echo $_SESSION['num'];?>" readonly>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <label class="label">Password</label>
                                    <input class="input--style-4 js-datepicker" type="text" name="password" value="<?php echo $_SESSION['pwd'];?>" readonly>
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="findhs" style="display: none;" >
        <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
            <h2 class="title">HELPER SERVICE</h2>
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">
                        <form action="connecthelperservice.php" method="post">
                            <div class="row row-space">
                                <div class="col-2"> 
                                    <label class="label">Select Helper Service</label>
                                    <select name="hs" id="hs">
                                        <option value="mechanic">Mechanic</option>
                                        <option value="towing">Towing</option>
                                        <option value="fuel">Fuel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <label class="label">Latitude</label>
                                    <input class="input--style-4 js-datepicker" type="text" name="latitude" id="lat" readonly>
                                </div>
                            </div> 
                            <div class="row row-space">
                                <div class="col-2">
                                    <label class="label">Longitude</label>
                                    <input class="input--style-4 js-datepicker" type="text" name="longitude" id="lng" readonly>
                                </div>
                                <button type="button" onclick="getLocation()">Get Location</button>
                            </div> 
                            <div class="row row-space">
                                <div class="col-2">
                                    <input type="submit" class="button" value="Get Helper Service">
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        <script>
            function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
            }

            function showPosition(position) {
            document.getElementById("lat").value=position.coords.latitude;
            document.getElementById("lng").value=position.coords.longitude;
            }
        </script>
                   
    </div> 
    
    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }           
  }
}
</script>
<script src="assets/js/userprofile.js"></script>
    <!-- Chatbot -->
    <div class="botIcon">
        <div class="botIconContainer">
            <div class="iconInner">
                <i class="fa fa-commenting" aria-hidden="true"></i>
            </div>
        </div>
        <div class="Layout Layout-open Layout-expand Layout-left">
            <div class="Messenger_messenger">
                <div class="Messenger_header">
                    <h4 class="Messenger_prompt">How can we help you?</h4> <span class="chat_close_icon"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                </div>
                <div class="Messenger_content">
                    <div class="Messages">
                        <div class="Messages_list"></div>
                    </div>
                    <form id="messenger">
                        <div class="Input Input-blank">
                            <input name="msg" class="Input_field" placeholder="Send a message...">
                            <button type="submit" id="send-btn" class="Input_button Input_button-send">
                                <div class="Icon">
                                    <img src="assets/img/send-message.png" alt="send message" width="30" height="30">
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Chatbot -->
<script src="assets/js/chatbot.js"></script>
</body>
</html>