<?php
include('connection.php');

$sql1="INSERT INTO user_details (name, mail_id, number, password) 
VALUES ('".$_POST["uname"]."','".$_POST["uemail"]."','".$_POST["unumber"]."','".$_POST["upassword"]."')";

if ($conn->query($sql1)==TRUE){
    echo "<script>alert('Registration Successful');
    window.location.href='userindex.php';
    </script>"; 
}else{
    echo "Registration Failed";
}
?>