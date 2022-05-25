<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <link href="assets/css/login.css" rel="stylesheet">
    <title>Mid Road Helper</title>
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>

<body class="bg-gra-02">
    <div class="form">

        <div class="tab-content">
            <div id="login">
                <form action="hslogin.php" method="post" class="login">
                    <h1>Welcome Back!</h1>
                    <div class="field-wrap">
                        <label class="for">
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="email" name="hsemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label class="for">
                            Password<span class="req">*</span>
                        </label>
                        <input type="password" name="hspassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                        title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete="off" />
                    </div>

                    <p class="forgot"><a href="#">Forgot Password?</a></p>
                    <p class="hsmessage">Not registered? <a href="#">Sign In</a></p>
                    <?php
                        if(isset($_GET['hslogin'])){
                            if('false'==$_GET['hslogin']){
                                echo '<span style="color:red">Username or Password incorrect....</span>';
                            }
                        }
                    ?>
                    <button type="submit" class="button button-block" name="loginhs"/>Log In</button>

                </form>
                <form id="register-form" action="hsregister.php" method="post" class="login" enctype="multipart/form-data">
                    <h1>Sign Up</h1>
                    <div class="field-wrap">
                        <label class="for"> Your Name<span class="req">*</span> </label>
                        <input type="text" name="hsname" required autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label class="for"> Business Name<span class="req">*</span> </label>
                        <input type="text" name="businessname" required autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label class="for"> Email Address<span class="req">*</span> </label>
                        <input type="email" name="hsemail" name="hsemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address" required autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label class="for"> Number<span class="req">*</span> </label>
                        <input type="text" name="hsnumber" pattern="[6789][0-9]{9}" title="Please enter valid phone number" required autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label class="for"> Service<span class="req">*</span> </label><br>
                    </div>
                    <div class="field-wrap">
                        <input type="radio" name="service" id="mechanic" value="mechanic" checked><label for="mechanic" class="option">Mechanic</label>
                        <input type="radio" name="service" id="towing" value="towing">  <label for="towing" class="option">Towing</label>                  
                        <input type="radio" name="service" id="fuel" value="fuel"><label for="fuel" class="option">Fuel</label>
                    </div>
                    <div class="field-wrap">
                        <label class="for"> Vehicle Type<span class="req">*</span> </label>
                        <input type="text" name="vehicletype" required autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label class="for"> Available<span class="req">*</span> </label>
                        <input type="text" name="available" required autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label class="option"> Location<span class="req">*</span> </label>
                    </div>
                    <div class="field-wrap">
                        <div id="map"></div>
                    </div>
                    <div class="field-wrap">
                        <label class="option"> Latitude<span class="req">*</span> </label>
                        <input type="text" name="latitude" id="latitude" required autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label class="option"> Longitude<span class="req">*</span> </label>
                        <input type="text" name="longitude" id="longitude" required autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label class="option"> Proof<span class="req">*</span> </label>
                        <input type="file" id="proof" name="proof" accept="image/*">
                    </div>
                    <div class="top-row">
                        <div class="field-wrap">
                            <label class="for"> Set A Password<span class="req">*</span> </label>
                            <input type="password" name="hspassword" id="hspassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                            title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete="off" />
                        </div>
                        <div class="field-wrap">
                            <label class="for"> Confirm Password<span class="req">*</span> </label>
                            <input type="password" id="hsconfirmpassword" name="hsconfirmpassword" onkeyup='hscheck();'
                                required autocomplete="off" />
                        </div>
                    </div>
                    <center><span id='hsmessage'></span></center><br>
                    <button type="submit" name="submit" class="button button-block" id="hsButton" />Get Started</button>
                    <p class="usermessage">Already registered? <a href="#">Log In</a></p>
                </form>

            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->
    <script src="assets/js/login.js"></script>
    <script type="text/javascript">
		var map; 
		var marker = false;
		function initMap() {
			var centerOfMap = new google.maps.LatLng(11.212525159167132, 78.72796201915371);
			var options = {
				center: centerOfMap, 
				zoom: 7 
			};
			map = new google.maps.Map(document.getElementById('map'), options);
			google.maps.event.addListener(map, 'click', function(event) {
				var clickedLocation = event.latLng;
				if(marker === false) {
					//Create the marker.
					marker = new google.maps.Marker({
						position: clickedLocation,
						map: map,
						draggable: true 
					});
					google.maps.event.addListener(marker, 'dragend', function(event) {
						markerLocation();
					});
				} else {
					marker.setPosition(clickedLocation);
				}
				//Get the marker's location.
				markerLocation();
			});
		}
		//This function will get the marker's current location and then add the lat/long
		//values to our textfields so that we can save the location.
		function markerLocation() {
			//Get location.
			var currentLocation = marker.getPosition();
			//Add lat and lng values to a field that we can save.
			document.getElementById('latitude').value = currentLocation.lat(); //latitude
			document.getElementById('longitude').value = currentLocation.lng(); //longitude
		}
		//Load the map when the page has finished loading.
		google.maps.event.addDomListener(window, 'load', initMap);
	</script>
	<script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
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
</body>

</html>