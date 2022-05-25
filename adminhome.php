<?php include('adminlogin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<title>Mid Road Helper</title>
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
	<link rel="stylesheet" href="assets/css/head.css" />
    <link rel="stylesheet" href="assets/css/table.css" />
</head>

<body>
    <div class="header">
        <div class="row">
            <div class="logo">
                <img src="assets/img/logo.png">
            </div>
            <div >
            <div style="float:right;margin-right: 100px; color:blue;font-size:25px;">
                    <?php echo "WELCOME ".strtoupper($_SESSION['name']);?>    
                </div>
                <div class="dnav">
                    <ul class="main-nav">
                        <li><a href="#" onclick="toggleVisibility('home');">Home</a></li>
                        <li><a href="#" onclick="toggleVisibility('custdetails');">User Details</a></li>
                        <li><a href="#" onclick="toggleVisibility('business');">Helper Service</a></li>
                        <li><a href="#" onclick="toggleVisibility('approve');">Approve Helper Service</a></li>
                        <li><a href="#" onclick="toggleVisibility('feedback');">Feedback</a></li>
                        <li><a href="index.html">Logout</a></li>
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
                Roadside assistance is a vehicular support service offered by MidRoad Mechanic to individuals who experience a vehicular breakdown. The service typically provides benefits such as getting the vehicle fixed on the spot, refueling it, towing the vehicle to the nearest garage or a specific location, extending medical assistance and much more. MidRoad Mechanic offers the best road assistance for cars / four wheelers and two wheelers in India.
            </p>
        </div>
        <div style="float:right;width:40%;margin-right:100px;">
            <img src="assets/img/carmechimg.jpg">
        </div>
    </div>
    <div id="custdetails" style="display: none;">
						
                    <?php
                include('connection.php');
                $sql = "select user_id,name,password,mail_id,number from user_details";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {    
                echo '<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." title="Type in a name">
                <table class="customers" id="myTable">
                <tr >
                    <th >ID</th>
                    <th >User Name</th>
                    <th >Password</th>
                    <th >E-mail</th>
                    <th >Number</th>
                </tr>';
                while($row = $result->fetch_assoc()) {
                echo '
                        <tr >
                            <td >'. $row["user_id"].'</td>
                            <td >'. $row["name"].'</td>
                            <td >'. $row["password"].'</td>
                            <td >'. $row["mail_id"].'</td>
                            <td >'. $row["number"].'</td>
                        </tr>';
                }
                } else { echo '<h1 style="margin-top:100px;"><center>No USERS Found</center></h1>'; }
                $conn->close();
            ?>
            </table>
    </div>
    <div id="business" style="display: none;" >
						
                    <?php
                include('connection.php');
                $sql1 = "select * from helperservice_details where status=1 ";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                // output data of each row
                echo '
                <table class="customers" id="myTable" style="margin-top:100px">
                <tr>
                    <th >HelperService ID</th>
                    <th >Name</th>
                    <th >Business Name</th>
                    <th >Email</th>
                    <th >Number</th>
                    <th> Service</th>
                    <th> Vehicle Type</th>
                    <th >Available</th>
                    <th >Latitude</th>
                    <th >Longitude</th>
                    <th>Proof</th>
                    <th >REMOVE</th>
                </tr>';
                while($row1 = $result1->fetch_assoc()) {
                echo '
                        <tr>
                            <td >'. $row1["hs_id"].'</td>
                            <td >'. $row1["name"].'</td>
                            <td >'. $row1["business_name"].'</td>
                            <td >'. $row1["email"].'</td>
                            <td >'. $row1["number"].'</td>
                            <td >'. $row1["service"].'</td>
                            <td>'.$row1["vehicle_type"].'</td>
                            <td >'. $row1["available"].'</td>
                            <td >'. $row1["latitude"].'</td>
                            <td >'. $row1["longitude"].'</td>
                            <td ><img src="assets/img/'. $row1["proof"].'"height="50" weight="50" onclick="openModal();currentSlide(1)" class="hover-shadow cursor"></td>';
                            echo '
                <div id="myModal" class="modal">
                    <span class="close cursor" onclick="closeModal()">&times;</span>
                    <div class="modal-content">
                        <div class="mySlides">
                            <img src="assets/img/'. $row1["proof"].'" style="width:100%">
                        </div>
                    </div>';
                echo "<td><form action='hsreject.php?id=".$row1['hs_id']."' method='POST'>    
                            <input type='submit' name='submit' value='DELETE'/></form></td></tr>";
                }
                } else { echo '<h1 style="margin-top:100px;"><center>No Helper Services Found</center></h1>'; }
                $conn->close();
            ?>
            </table>
    </div>
    <div id="approve" style="display: none;" >
    <?php
                include('connection.php');
                $sql1 = "select * from helperservice_details where status=0 ";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                // output data of each row
                echo '
                <table class="customers" id="myTable" style="margin-top:100px">
                <tr>
                    <th >HelperService ID</th>
                    <th >Name</th>
                    <th >Business Name</th>
                    <th >Email</th>
                    <th >Number</th>
                    <th> Service</th>
                    <th> Vehicle Type</th>
                    <th >Available</th>
                    <th >Latitude</th>
                    <th >Longitude</th>
                    <th>Proof</th>
                    <th >REMOVE</th>
                </tr>';
                while($row1 = $result1->fetch_assoc()) {
                echo '
                        <tr>
                            <td >'. $row1["hs_id"].'</td>
                            <td >'. $row1["name"].'</td>
                            <td >'. $row1["business_name"].'</td>
                            <td >'. $row1["email"].'</td>
                            <td >'. $row1["number"].'</td>
                            <td >'. $row1["service"].'</td>
                            <td>'.$row1["vehicle_type"].'</td>
                            <td >'. $row1["available"].'</td>
                            <td >'. $row1["latitude"].'</td>
                            <td >'. $row1["longitude"].'</td>
                            <td ><img src="assets/img/'. $row1["proof"].'"height="50" weight="50" onclick="openModal();currentSlide(1)" class="hover-shadow cursor"></td>';
                            echo '
                <div id="myModal" class="modal">
                    <span class="close cursor" onclick="closeModal()">&times;</span>
                    <div class="modal-content">
                        <div class="mySlides">
                            <img src="assets/img/'. $row1["proof"].'" style="width:100%">
                        </div>
                    </div>';
                echo "<td><form action='hsapprove.php?id=".$row1['hs_id']."' method='POST'>   
                            <input type='radio' id='approve' name='approval' value=1>
                            <label for='approve'>Approve</label><br>
                            <input type='radio' id='reject' name='approval' value=0>
                            <label for='reject'>Reject</label><br>   
                            <input type='submit' name='submit' /></form></td></tr>";
                }
                } else { echo '<h1 style="margin-top:100px;"><center>No Mechanics Found</center></h1>'; }
                $conn->close();
            ?>
            </table>
    </div>
    <div id="feedback" style="display: none;">
						
                        <?php
                    include('connection.php');
                    $sql = "select * from feedback";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    echo '
                    <table class="customers" id="myTable" style="margin-top:100px">
                    <tr >
                        <th >BusinessID</th>
                        <th >User Name</th>
                        <th >Message</th>
                        <th >E-mail</th>
                    </tr>';
                    while($row = $result->fetch_assoc()) {
                    echo '
                            <tr >
                                <td >'. $row["business_id"].'</td>
                                <td >'. $row["name"].'</td>
                                <td >'. $row["message"].'</td>
                                <td >'. $row["mail_id"].'</td>
                            </tr>';
                    }
                    } else { echo '<h1 style="margin-top:100px;"><center>No USERS Found</center></h1>'; }
                    $conn->close();
                ?>
            </table>
        </div>

   
    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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


        
    <script type="text/javascript">
        var divs = ["home", "custdetails", "business", "approve","feedback"];
        var visibleDivId = null;
        function toggleVisibility(divId) {
            if (visibleDivId === divId) {
                //visibleDivId = null;
            } else {
                visibleDivId = divId;
            }
            hideNonVisibleDivs();
        }
        function hideNonVisibleDivs() {
            var i, divId, div;
            for (i = 0; i < divs.length; i++) {
                divId = divs[i];
                div = document.getElementById(divId);
                if (visibleDivId === divId) {
                    div.style.display = "block";
                } else {
                div.style.display = "none";
                }
            }
        }
    </script>
    <script>
                function openModal() {
                document.getElementById("myModal").style.display = "block";
                }

                function closeModal() {
                document.getElementById("myModal").style.display = "none";
                }

                var slideIndex = 1;
                showSlides(slideIndex);

                function plusSlides(n) {
                showSlides(slideIndex += n);
                }

                function currentSlide(n) {
                showSlides(slideIndex = n);
                }

                function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("demo");
                var captionText = document.getElementById("caption");
                if (n > slides.length) {slideIndex = 1}
                if (n < 1) {slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " active";
                captionText.innerHTML = dots[slideIndex-1].alt;
                }
                </script>
    </body>
</html>