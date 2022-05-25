<?php
 session_start();
 $errors = array();
    if (isset($_POST['loginadmin'])) { 
        include('connection.php');
        $name=$_POST['name'];
        $password=$_POST['password'];
        $sql1="select name,password from admin_details where name='$name' and password='$password'";

        $result=mysqli_query($conn,$sql1);
        $row=mysqli_fetch_assoc($result);
        $count=mysqli_num_rows($result);

        if($count){
            $_SESSION['name']=$row['name'];
            $_SESSION['pwd']=$password;
            header("location: adminhome.php");
        }
        else{
            header('Location: adminindex.php?adminlogin=false');
        }
    }
?>