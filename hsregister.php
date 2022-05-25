<?php
include('connection.php');
if(isset($_POST['submit'])){
    $Get_image_name = $_FILES['proof']['name'];
    $image_Path = "assets/img/".basename($Get_image_name);
    $sql1="INSERT INTO helperservice_details (name,business_name,email,number,service,vehicle_type,available,latitude,longitude,password,proof) 
    VALUES ('".$_POST["hsname"]."','".$_POST["businessname"]."','".$_POST["hsemail"]."','".$_POST["hsnumber"]."','".$_POST["service"]."','".$_POST["vehicletype"]."','".$_POST["available"]."','".$_POST["latitude"]."','".$_POST["longitude"]."','".$_POST["hspassword"]."','".$Get_image_name."')";

    if ($conn->query($sql1)==TRUE && move_uploaded_file($_FILES['proof']['tmp_name'], $image_Path)){
        echo "<script>alert('Registration Successful');
        window.location.href='hsindex.php';
        </script>"; 
    }else{
        echo "Registration Failed";
    }
}

?>