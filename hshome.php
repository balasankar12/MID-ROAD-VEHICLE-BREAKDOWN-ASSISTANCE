<?php include('hslogin.php') ?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<title>Online Mid-road Mechanic</title>
		<link rel="stylesheet" href="assets/css/head.css" />
		<link rel="stylesheet" href="assets/css/table.css" />
		<link rel="stylesheet" href="assets/css/profile.css" />
		<style type="text/css">
		#map {
			width: 200px;
			height: 200px;
		}
		#userloc{
			width: 200px;
			height: 200px;
		}
		</style>
	</head>

	<body>
		<div class="header">
			<div class="row">
				<div class="logo"> <img src="assets/img/logo.png"> </div>
				<div>
					<div style="float:right;margin-right: 100px; color:blue;font-size:25px;">
						<?php
						include('connection.php');

						echo "WELCOME  ".strtoupper($_SESSION['hsname']);?>
					</div>
					<div class="dnav">
						<ul class="main-nav">
							<li><a href="#" onclick="toggleVisibility('home');">Home</a></li>
							<li><a href="#" onclick="toggleVisibility('hsprofile');">Profile</a></li>
							<li><a href="#" onclick="toggleVisibility('finduser');">Find User</a></li>
							<li><a href="#" onclick="toggleVisibility('feedback');">Feedback</a></li>
							<li><a href="hsindex.php">Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="home">
			<div style="float:left;width:40%;font-size: x-large; font-family: 'Eras Bold ITC'; font-weight: 1400; font-style: inherit;  color:dimgray;margin-left:50px;margin-top:70px">
				<p> <strong style="color:royalblue;">
                What is Roadside Assistance?
                </strong></br>
					</br> Roadside assistance is a vehicular support service offered by MidRoad Mechanic to individuals who experience a vehicular breakdown. The service typically provides benefits such as getting the vehicle fixed on the spot, refueling it, towing the vehicle to the nearest garage or a specific location, extending medical assistance and much more. MidRoad Mechanic offers the best road assistance for cars / four wheelers and two wheelers in India. </p>
			</div>
			<div style="float:right;width:40%;margin-right:100px;"> <img src="assets/img/carmechimg.jpg"> </div>
		</div>
		<div id="hsprofile" style="display: none;">
			<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
				<h2 class="title">BUSINESS PROFILE</h2>
				<div class="wrapper wrapper--w680">
					<div class="card card-4">
						<div class="card-body">
							<form method="POST">
							<div class="row row-space">
									<div class="col-2">
										<label class="label">Name</label>
										<input class="input--style-4" type="text" name="name" value="<?php echo $_SESSION['hsname'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Business Name</label>
										<input class="input--style-4" type="text" name="businessname" value="<?php echo $_SESSION['businessname'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">E-Mail</label>
										<input class="input--style-4 js-datepicker" type="text" name="mail" value="<?php echo $_SESSION['email'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Number</label>
										<input class="input--style-4 js-datepicker" type="text" name="number" value="<?php echo $_SESSION['number'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Password</label>
										<input class="input--style-4 js-datepicker" type="text" name="password" value="<?php echo $_SESSION['password'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Service</label>
										<input class="input--style-4 js-datepicker" type="text" name="service" value="<?php echo $_SESSION['service'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Vehicle Type</label>
										<input class="input--style-4 js-datepicker" type="text" name="vehicletype" value="<?php echo $_SESSION['vehicle_type'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Available</label>
										<input class="input--style-4 js-datepicker" type="text" name="available" value="<?php echo $_SESSION['available'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Latitude</label>
										<input class="input--style-4 js-datepicker" type="text" name="latitude" value="<?php echo $_SESSION['latitude'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Longitude</label>
										<input class="input--style-4 js-datepicker" type="text" name="Longitude" value="<?php echo $_SESSION['longitude'];?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">Status</label>
										<input class="input--style-4 js-datepicker" type="text" name="status" value="<?php if($_SESSION['status']==0){echo "PENDING";}else{echo "APPROVED";};?>" readonly> </div>
								</div>
								<div class="row row-space">
									<div class="col-2">
										<label class="label">ID-Proof</label>
										<img src="assets/img/<?php echo $_SESSION['proof'];?>"height="100" weight="100" class="hover-shadow cursor">
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="finduser" style="display: none;">
			
		</div>

		<div id="feedback" style="display: none;">
									
		<?php
						include('connection.php');
						$sql4 = "select * from feedback where business_id='{$_SESSION['businessid']}'";
						$result4 = $conn->query($sql4);
						if ($result4->num_rows > 0) {
						// output data of each row
						echo '<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name">
						<table class="customers" id="myTable">
						<tr >
							<th >Mechanic ID</th>
							<th >User Name</th>
							<th >Message</th>
						</tr>';
						while($row4 = $result4->fetch_assoc()) {
						echo '
								<tr >
									<td >'. $row4["mechanic_id"].'</td>
									<td >'. $row4["name"].'</td>
									<td >'. $row4["message"].'</td>
								</tr>';
						}
						} else { echo '<h1 style="margin-top:100px;"><center>No USERS Found</center></h1>'; }
						$conn->close();
					?>
				</table>
		</div>
		<script src="assets/js/hsprofile.js"></script>
		<script type="text/javascript">
		//Set up some of our variables.
		var map; //Will contain map object.
		var marker = false; ////Has the user plotted their location marker? 
		//Function called to initialize / create the map.
		//This is called when the page has loaded.
		function initMap() {
			//The center location of our map.
			var centerOfMap = new google.maps.LatLng(11.212525159167132, 78.72796201915371);
			//Map options.
			var options = {
				center: centerOfMap, //Set center.
				zoom: 7 //The zoom value.
			};
			//Create the map object.
			map = new google.maps.Map(document.getElementById('map'), options);
			//Listen for any clicks on the map.
			google.maps.event.addListener(map, 'click', function(event) {
				//Get the location that the user clicked.
				var clickedLocation = event.latLng;
				//If the marker hasn't been added.
				if(marker === false) {
					//Create the marker.
					marker = new google.maps.Marker({
						position: clickedLocation,
						map: map,
						draggable: true //make it draggable
					});
					//Listen for drag events!
					google.maps.event.addListener(marker, 'dragend', function(event) {
						markerLocation();
					});
				} else {
					//Marker has already been added, so just change its location.
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
			document.getElementById('lat').value = currentLocation.lat(); //latitude
			document.getElementById('lng').value = currentLocation.lng(); //longitude
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