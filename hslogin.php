<?php
 session_start();
 $errors = array();
    if (isset($_POST['loginhs'])) { 
        include('connection.php');
        $mailid=mysqli_real_escape_string($conn,$_POST['hsemail']);
        $password=mysqli_real_escape_string($conn,$_POST['hspassword']);
        $sql1="select hs_id,name,business_name,email,number,service,vehicle_type,available,latitude,longitude,password,status,proof from helperservice_details where email='$mailid' and password='$password'";

        $result=mysqli_query($conn,$sql1);
        $row=mysqli_fetch_assoc($result);
        $count=mysqli_num_rows($result);

        if($count==1){
            $_SESSION['hsid']=$row['hs_id'];
            $_SESSION['hsname']=$row['name'];
            $_SESSION['businessname']=$row['business_name'];
            $_SESSION['password']=$row['password'];
            $_SESSION['email']=$row['email'];
            $_SESSION['number']=$row['number'];
            $_SESSION['service']=$row['service'];
            $_SESSION['vehicle_type']=$row['vehicle_type'];
            $_SESSION['available']=$row['available'];
            $_SESSION['latitude']=$row['latitude'];
            $_SESSION['longitude']=$row['longitude'];
            $_SESSION['status']=$row['status'];
            $_SESSION['proof']=$row['proof'];
            header("location: hshome.php");
        }
        else{
            header('Location: hsindex.php?hslogin=false');
        }
    }
?>